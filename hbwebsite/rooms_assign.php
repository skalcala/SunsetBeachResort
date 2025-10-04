<?php
header('Content-Type: application/json; charset=utf-8');
require_once 'inc/db_config.php';
if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    echo json_encode(['success'=>false,'error'=>'POST required']);
    exit;
}
$type = isset($_POST['type_id']) ? (int)$_POST['type_id'] : 0;
if($type <= 0){ echo json_encode(['success'=>false,'error'=>'Invalid type']); exit; }
$con = $GLOBALS['con'];
if(!mysqli_num_rows(mysqli_query($con, "SHOW TABLES LIKE 'rooms'"))){
    // no rooms table — nothing to assign
    echo json_encode(['success'=>false,'error'=>'No rooms table']);
    exit;
}
// discover columns
$roomColsRes = mysqli_query($con, "DESCRIBE rooms");
$roomCols = [];
while($r = mysqli_fetch_assoc($roomColsRes)) $roomCols[] = $r['Field'];
$numCol = in_array('room_number', $roomCols) ? 'room_number' : (in_array('number',$roomCols)? 'number' : null);
$typeCol = in_array('type_id',$roomCols) ? 'type_id' : (in_array('room_type',$roomCols)? 'room_type': null);

// Try to find an available unit
if($typeCol){
    $sql = "SELECT ".($numCol?$numCol:'room_id')." AS rn, room_id AS id FROM rooms WHERE ".$typeCol." = ?";
    if(in_array('status',$roomCols)) $sql .= " AND status = 1";
    $sql .= " LIMIT 1";
    $res = select($sql, [$type], 'i');
    $row = $res ? mysqli_fetch_assoc($res) : null;
    if($row){ echo json_encode(['success'=>true,'assigned_room_id'=>$row['id'],'room_number'=>$row['rn']]); exit; }
    // create a new unit using simple numbering
    $newNumber = ($type*100) + 1;
    $insCols = [];$insVals=[];$insTypes='';
    if($numCol){ $insCols[]=$numCol; $insVals[]=(string)$newNumber; $insTypes.='s'; }
    $insCols[]=$typeCol; $insVals[]=$type; $insTypes.='i';
    if(in_array('status',$roomCols)){ $insCols[]='status'; $insVals[]=1; $insTypes.='i'; }
    $sql = "INSERT INTO rooms (".implode(',', $insCols).") VALUES (".implode(',', array_fill(0,count($insCols),'?')).")";
    $r = insert($sql, $insVals, $insTypes);
    if($r == 1){ $id = mysqli_insert_id($con); echo json_encode(['success'=>true,'assigned_room_id'=>$id,'room_number'=>$newNumber]); exit; }
}
echo json_encode(['success'=>false,'error'=>'No assignment possible']);
