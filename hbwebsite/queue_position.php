<?php
header('Content-Type: application/json; charset=utf-8');
require_once 'inc/db_config.php';
if($_SERVER['REQUEST_METHOD'] !== 'GET'){ echo json_encode(['success'=>false,'error'=>'GET required']); exit; }
$room_id = isset($_GET['room_id']) ? intval($_GET['room_id']) : 0;
$rid = isset($_GET['rid']) ? intval($_GET['rid']) : 0;
$token = isset($_GET['token']) ? trim($_GET['token']) : null;
if($room_id <= 0){ echo json_encode(['success'=>false,'error'=>'Invalid room id']); exit; }
$con = $GLOBALS['con'];
// Count reservations in 'Queued' status with same room_id ordered by created_at; return position (number ahead of caller)
// If token provided, find its created_at to compute position; otherwise, return total queued count
if($token){
  $stmt = mysqli_prepare($con, 'SELECT created_at FROM reservations WHERE room_id = ? AND status = "Queued" AND status_token = ? LIMIT 1');
  if(!$stmt){ echo json_encode(['success'=>false,'error'=>mysqli_error($con)]); exit; }
  mysqli_stmt_bind_param($stmt, 'is', $room_id, $token);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_bind_result($stmt, $created_at);
  if(mysqli_stmt_fetch($stmt)){
    mysqli_stmt_close($stmt);
    $stmt2 = mysqli_prepare($con, 'SELECT COUNT(*) FROM reservations WHERE room_id = ? AND status = "Queued" AND created_at < ?');
    if(!$stmt2){ echo json_encode(['success'=>false,'error'=>mysqli_error($con)]); exit; }
    mysqli_stmt_bind_param($stmt2, 'is', $room_id, $created_at);
    mysqli_stmt_execute($stmt2);
    mysqli_stmt_bind_result($stmt2, $count);
    mysqli_stmt_fetch($stmt2);
    mysqli_stmt_close($stmt2);
    echo json_encode(['success'=>true,'ahead'=>intval($count)]);
    exit;
  } else { mysqli_stmt_close($stmt); echo json_encode(['success'=>false,'error'=>'Token not found']); exit; }
} else {
  $stmt = mysqli_prepare($con, 'SELECT COUNT(*) FROM reservations WHERE room_id = ? AND status = "Queued"');
  if(!$stmt){ echo json_encode(['success'=>false,'error'=>mysqli_error($con)]); exit; }
  mysqli_stmt_bind_param($stmt, 'i', $room_id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_bind_result($stmt, $count);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
  echo json_encode(['success'=>true,'ahead'=>intval($count)]);
  exit;
}
?>