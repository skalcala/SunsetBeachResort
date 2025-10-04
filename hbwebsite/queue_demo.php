<?php
// Simple demo queue endpoint that always returns 2 people ahead for the room (for UI/demo purposes)
header('Content-Type: application/json; charset=utf-8');
$room_id = isset($_GET['room_id']) ? intval($_GET['room_id']) : 0;
// You can later adjust logic to compute real queue position; for demo always 2
echo json_encode(['success'=>true,'ahead'=>2,'room_id'=>$room_id]);
?>