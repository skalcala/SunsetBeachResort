<?php
// Returns JSON { success: true, status: 'Queued'|'Confirmed'|... } for a given reservation id
header('Content-Type: application/json; charset=utf-8');
require_once 'inc/db_config.php';
if($_SERVER['REQUEST_METHOD'] !== 'GET'){
  echo json_encode(['success'=>false,'error'=>'GET required']); exit;
}
$rid = isset($_GET['rid']) ? intval($_GET['rid']) : 0;
if($rid <= 0){ echo json_encode(['success'=>false,'error'=>'Invalid reservation id']); exit; }
// require either a matching status_token or that the current session user owns the reservation
$token = isset($_GET['token']) ? trim($_GET['token']) : null;
if (session_status() === PHP_SESSION_NONE) session_start();
$user_id = isset($_SESSION['user_id']) ? intval($_SESSION['user_id']) : null;

$con = $GLOBALS['con'];
$stmt = mysqli_prepare($con, 'SELECT status, user_id, status_token FROM reservations WHERE id = ? LIMIT 1');
if(!$stmt){ echo json_encode(['success'=>false,'error'=>'DB prepare failed: '.mysqli_error($con)]); exit; }
mysqli_stmt_bind_param($stmt, 'i', $rid);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $status, $row_user_id, $row_token);
if(mysqli_stmt_fetch($stmt)){
  mysqli_stmt_close($stmt);
  // allow if token matches or session user owns reservation
  if($token && $row_token && hash_equals($row_token, $token)){
    echo json_encode(['success'=>true,'status'=>$status]);
    exit;
  }
  if($user_id && $user_id === intval($row_user_id)){
    echo json_encode(['success'=>true,'status'=>$status]);
    exit;
  }
  echo json_encode(['success'=>false,'error'=>'Unauthorized']);
  exit;
} else {
  mysqli_stmt_close($stmt);
  echo json_encode(['success'=>false,'error'=>'Reservation not found']);
  exit;
}
