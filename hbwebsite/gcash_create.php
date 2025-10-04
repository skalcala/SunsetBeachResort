<?php
// Minimal GCash create endpoint - returns a mock checkout URL when no keys configured
header('Content-Type: application/json');
require_once 'inc/payment_config.php';
$cfg = require 'inc/payment_config.php';

$nights = isset($_POST['nights']) ? intval($_POST['nights']) : 1;
$room_id = isset($_POST['room_id']) ? intval($_POST['room_id']) : 0;
$price_per_night = isset($_POST['price']) ? floatval($_POST['price']) : 0;
$amount = $price_per_night * max(1, $nights);

// If GCash keys not configured, return mock popup URL
if(empty($cfg['gcash']['client_id']) || empty($cfg['gcash']['client_secret'])){
    $params = http_build_query([
        'price' => $price_per_night,
        'nights' => $nights,
        'room_id' => $room_id,
        'name' => $_POST['name'] ?? '',
        'checkin' => $_POST['checkin'] ?? '',
        'checkout' => $_POST['checkout'] ?? '',
    ]);
    echo json_encode(['success'=>true, 'checkout_url'=> 'provider_mock/gcash_checkout.php?' . $params, 'amount'=>$amount]);
    exit;
}

// Real GCash integration would go here (create payment request, redirect URL etc.)
echo json_encode(['success'=>false,'error'=>'GCash integration not configured.']);

?>
