<?php
header('Content-Type: application/json');
require('inc/db_config.php');

$room_id = isset($_POST['room_id']) ? (int)$_POST['room_id'] : 0;
$checkin = isset($_POST['checkin']) ? $_POST['checkin'] : '';
$checkout = isset($_POST['checkout']) ? $_POST['checkout'] : '';
$capacity = isset($_POST['capacity']) ? (int)$_POST['capacity'] : 5;

if($room_id === 0 || empty($checkin) || empty($checkout)){
  echo json_encode(['available'=>true, 'current'=>0]);
  exit;
}

try {
  // Count overlapping bookings for this room and date range
  $stmt = $con->prepare("
    SELECT COUNT(*) as booking_count 
    FROM reservations 
    WHERE room_id = ? 
    AND status IN ('confirmed', 'pending', 'checked_in')
    AND checkin < ? 
    AND checkout > ?
  ");
  
  $stmt->bind_param('iss', $room_id, $checkout, $checkin);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $current_bookings = (int)$row['booking_count'];
  $stmt->close();
  
  $available = $current_bookings < $capacity;
  
  echo json_encode([
    'available' => $available,
    'current' => $current_bookings,
    'capacity' => $capacity
  ]);
  
} catch(Exception $e) {
  // If error checking database, assume available
  echo json_encode(['available'=>true, 'current'=>0, 'error'=>$e->getMessage()]);
}
?>