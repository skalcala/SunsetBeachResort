<?php
header('Content-Type: application/json');
require('inc/db_config.php');

// Get POST data
$room_id = isset($_POST['room_id']) ? (int)$_POST['room_id'] : 0;
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$address = isset($_POST['address']) ? trim($_POST['address']) : '';
$checkin = isset($_POST['checkin']) ? $_POST['checkin'] : '';
$checkout = isset($_POST['checkout']) ? $_POST['checkout'] : '';
$adults = isset($_POST['adults']) ? (int)$_POST['adults'] : 1;
$children = isset($_POST['children']) ? (int)$_POST['children'] : 0;
$transaction_id = isset($_POST['transaction_id']) ? $_POST['transaction_id'] : '';
$provider = isset($_POST['provider']) ? $_POST['provider'] : 'unknown';
$price = isset($_POST['price']) ? (float)$_POST['price'] : 0;
$nights = isset($_POST['nights']) ? (int)$_POST['nights'] : 0;
$booking_type = isset($_POST['booking_type']) ? $_POST['booking_type'] : 'confirmed';

// Room capacity configuration
$room_capacities = [
  1 => ['capacity'=>5, 'queue_limit'=>5],
  2 => ['capacity'=>5, 'queue_limit'=>5],
  3 => ['capacity'=>5, 'queue_limit'=>5],
  4 => ['capacity'=>5, 'queue_limit'=>5],
  5 => ['capacity'=>5, 'queue_limit'=>5],
];

// IMPROVED VALIDATION with specific error messages
$errors = [];

if($room_id === 0) {
  $errors[] = 'Room ID is missing or invalid';
}
if(empty($name)) {
  $errors[] = 'Name is required';
}
if(empty($phone)) {
  $errors[] = 'Phone is required';
}
if(empty($checkin)) {
  $errors[] = 'Check-in date is required';
}
if(empty($checkout)) {
  $errors[] = 'Check-out date is required';
}

// If there are validation errors, return them
if(!empty($errors)) {
  echo json_encode([
    'success'=>false, 
    'error'=>'Missing required fields: ' . implode(', ', $errors),
    'debug' => [
      'room_id' => $room_id,
      'name' => $name,
      'phone' => $phone,
      'checkin' => $checkin,
      'checkout' => $checkout,
      'received_post' => array_keys($_POST)
    ]
  ]);
  exit;
}

// Validate name (letters, spaces, and common name characters only)
if(!preg_match('/^[a-zA-Z\s\-\.\']+$/', $name)){
  echo json_encode(['success'=>false, 'error'=>'Name can only contain letters, spaces, hyphens, and apostrophes']);
  exit;
}

// Validate phone (numbers only, 10-11 digits)
if(!preg_match('/^[0-9]{10,11}$/', $phone)){
  echo json_encode(['success'=>false, 'error'=>'Phone must be 10-11 digits only (no spaces or dashes)']);
  exit;
}

// Validate dates
$checkin_date = strtotime($checkin);
$checkout_date = strtotime($checkout);
$today = strtotime(date('Y-m-d'));

if($checkin_date === false) {
  echo json_encode(['success'=>false, 'error'=>'Invalid check-in date format']);
  exit;
}
if($checkout_date === false) {
  echo json_encode(['success'=>false, 'error'=>'Invalid check-out date format']);
  exit;
}
if($checkin_date < $today) {
  echo json_encode(['success'=>false, 'error'=>'Check-in date cannot be in the past']);
  exit;
}
if($checkout_date <= $checkin_date) {
  echo json_encode(['success'=>false, 'error'=>'Check-out date must be after check-in date']);
  exit;
}

// Calculate nights if not provided
if($nights === 0) {
  $nights = ceil(($checkout_date - $checkin_date) / 86400);
}

$total_amount = $price * $nights;

try {
  // Check current bookings for this room and date range
  $capacity = $room_capacities[$room_id]['capacity'] ?? 5;
  $queue_limit = $room_capacities[$room_id]['queue_limit'] ?? 5;
  
  // Count confirmed bookings (not queued)
  $stmt = $con->prepare("
    SELECT COUNT(*) as booking_count 
    FROM reservations 
    WHERE room_id = ? 
    AND status IN ('confirmed', 'pending', 'checkin')
    AND (queued IS NULL OR queued = 0)
    AND checkin < ? 
    AND checkout > ?
  ");
  $stmt->bind_param('iss', $room_id, $checkout, $checkin);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $confirmed_count = (int)$row['booking_count'];
  $stmt->close();
  
  // Count queued bookings
  $stmt2 = $con->prepare("
    SELECT COUNT(*) as queue_count 
    FROM reservations 
    WHERE room_id = ? 
    AND status IN ('confirmed', 'pending', 'queued')
    AND queued = 1
    AND checkin < ? 
    AND checkout > ?
  ");
  $stmt2->bind_param('iss', $room_id, $checkout, $checkin);
  $stmt2->execute();
  $result2 = $stmt2->get_result();
  $row2 = $result2->fetch_assoc();
  $queue_count = (int)$row2['queue_count'];
  $stmt2->close();
  
  // Determine if this booking should be queued
  $is_queued = 0;
  $status = 'Confirmed';
  
  if($confirmed_count >= $capacity) {
    // Room is full, check queue
    if($queue_count >= $queue_limit) {
      echo json_encode([
        'success'=>false, 
        'error'=>'Room is completely booked. Both confirmed slots and queue are full.',
        'confirmed_count'=>$confirmed_count,
        'queue_count'=>$queue_count,
        'capacity'=>$capacity,
        'queue_limit'=>$queue_limit
      ]);
      exit;
    }
    // Add to queue
    $is_queued = 1;
    $status = 'Pending';
  }
  
  // Generate unique reservation ID
  $reservation_id = 'RES-' . strtoupper(uniqid());
  $status_token = bin2hex(random_bytes(16));
  
  // Calculate total PAX
  $pax = $adults + $children;
  
  // Insert booking
  $stmt3 = $con->prepare("
    INSERT INTO reservations 
    (reservation_id, room_id, guest_name, phone, address, checkin, checkout, 
     pax, total_amount, transaction_id, payment_method, 
     status, queued, queue_position, status_token, created_at) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())
  ");
  
  $queue_position = $is_queued ? ($queue_count + 1) : 0;
  
  $stmt3->bind_param(
    'sissssiddsssiss',
    $reservation_id,
    $room_id,
    $name,
    $phone,
    $address,
    $checkin,
    $checkout,
    $pax,
    $total_amount,
    $transaction_id,
    $provider,
    $status,
    $is_queued,
    $queue_position,
    $status_token
  );
  
  if($stmt3->execute()) {
    $insert_id = $stmt3->insert_id;
    $stmt3->close();
    
    echo json_encode([
      'success' => true,
      'id' => $insert_id,
      'reservation_id' => $reservation_id,
      'transaction_id' => $transaction_id,
      'room_id' => $room_id,
      'queued' => $is_queued == 1,
      'queue_position' => $queue_position,
      'status' => $status,
      'status_token' => $status_token,
      'message' => $is_queued ? 
        'Booking added to queue (position ' . $queue_position . ')' : 
        'Booking confirmed successfully!',
      'redirect' => 'thank_you.php?reservation=' . $reservation_id
    ]);
  } else {
    echo json_encode([
      'success'=>false, 
      'error'=>'Failed to save booking: ' . $stmt3->error,
      'sql_error' => $con->error
    ]);
  }
  
} catch(Exception $e) {
  echo json_encode([
    'success'=>false, 
    'error'=>'Database error: ' . $e->getMessage(),
    'trace' => $e->getTraceAsString()
  ]);
}
?>