<?php
// GCash webhook skeleton - verifies payload and updates reservation status
// NOTE: This is a skeleton for demo. Implement signature verification per GCash docs when you have webhook secret.
header('Content-Type: application/json');
require_once 'inc/db_config.php';

$body = file_get_contents('php://input');
$json = json_decode($body, true);

// Basic validation
if(!$json){ http_response_code(400); echo json_encode(['success'=>false,'error'=>'Invalid JSON']); exit; }

// Example expected fields (adjust to GCash webhook body): transaction_id, status
$tx = $json['transaction_id'] ?? null;
$status = $json['status'] ?? null;

if(!$tx || !$status){ http_response_code(400); echo json_encode(['success'=>false,'error'=>'Missing transaction_id or status']); exit; }

// Map provider status to local status (demo mapping)
$map = [ 'paid' => 'Confirmed', 'pending' => 'Pending', 'cancelled' => 'Cancelled' ];
$localStatus = $map[strtolower($status)] ?? 'Pending';

// Update reservation with matching transaction_id
$con = $GLOBALS['con'];
$stmt = mysqli_prepare($con, "UPDATE reservations SET status = ? WHERE transaction_id = ?");
if(!$stmt){ http_response_code(500); echo json_encode(['success'=>false,'error'=>mysqli_error($con)]); exit; }
mysqli_stmt_bind_param($stmt, 'ss', $localStatus, $tx);
mysqli_stmt_execute($stmt);
$affected = mysqli_stmt_affected_rows($stmt);
mysqli_stmt_close($stmt);

echo json_encode(['success'=>true,'updated_rows'=>$affected]);
exit;

?>
