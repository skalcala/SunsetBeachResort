<?php
// Prepare a PayMongo checkout session (demo-friendly)
header('Content-Type: application/json');
require_once 'inc/payment_config.php';
$cfg = require 'inc/payment_config.php';

// Expected POST: amount, currency (optional), metadata (optional)
// Determine room price server-side to avoid trusting client-sent prices
$nights = isset($_POST['nights']) ? intval($_POST['nights']) : 1;
$room_id = isset($_POST['room_id']) ? intval($_POST['room_id']) : 0;

// minimal room price map (keep in sync with booking.php)
$rooms = [
  1 => ['price'=>1499],
  2 => ['price'=>1999],
  3 => ['price'=>2999],
  4 => ['price'=>3499],
  5 => ['price'=>4999],
];

$price_per_night = isset($rooms[$room_id]) ? $rooms[$room_id]['price'] : (isset($_POST['price']) ? floatval($_POST['price']) : 0);
$amount = $price_per_night * max(1, $nights);

// Use mock popup when no secret key set
if(empty($cfg['paymongo']['secret_key'])){
    // Build mock popup URL -> provider_mock/paymongo_checkout.php (pass price per night)
    $params = http_build_query([
        'price' => $price_per_night,
        'nights' => $nights,
        'room_id' => $room_id,
        'name' => $_POST['name'] ?? '',
        'phone' => $_POST['phone'] ?? '',
    ]);
    echo json_encode(['success'=>true, 'checkout_url'=> 'provider_mock/paymongo_checkout.php?' . $params, 'amount'=>$amount]);
    exit;
}

// TODO: Implement PayMongo API calls here (create payment intent / source / checkout session)
// Example flow:
// 1) Create a payment intent or source with the amount
// 2) Create a checkout session URL or client key
// 3) Return the checkout URL to the browser so it can redirect/open

// For security, perform server-side verification and store transaction metadata.

echo json_encode(['success'=>false,'error'=>'PayMongo secret key not configured.']);
