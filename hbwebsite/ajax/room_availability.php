<?php
// Returns JSON: { room_id, date, available: true/false, remaining: int }
header('Content-Type: application/json; charset=utf-8');
require_once '../inc/db_config.php';
$room_id = isset($_GET['room_id']) ? intval($_GET['room_id']) : 0;
$date = isset($_GET['date']) ? $_GET['date'] : '';
if($room_id <= 0 || !$date){ echo json_encode(['success'=>false,'error'=>'Missing room_id or date']); exit; }
$con = $GLOBALS['con'];
$sql = "SELECT COUNT(*) AS booked_count FROM reservations WHERE room_id = ? AND status IN ('Queued','Pending','Confirmed','Checkin') AND ? >= checkin AND ? < checkout";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, 'iss', $room_id, $date, $date);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$booked_count = 0;
if($res && ($row = mysqli_fetch_assoc($res))) $booked_count = intval($row['booked_count']);
$max_rooms = 10;
$remaining = max(0, $max_rooms - $booked_count);
$available = $remaining > 0;
echo json_encode(['success'=>true,'room_id'=>$room_id,'date'=>$date,'available'=>$available,'remaining'=>$remaining]);
exit;
?>
