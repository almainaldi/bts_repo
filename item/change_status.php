<?php
require "../config/session.php";
require "../config/db.php";

$id = $_POST['id'] ?? '';
$status = $_POST['is_completed'] ?? 0;

$stmt = $conn->prepare("UPDATE items SET is_completed = ? WHERE id = ?");
$stmt->execute([$status, $id]);

echo json_encode(["message" => "Status updated"]);
