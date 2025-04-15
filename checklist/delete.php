<?php
require "../config/session.php";
require "../config/db.php";

$id = $_POST['id'] ?? '';
$stmt = $conn->prepare("DELETE FROM checklists WHERE id = ? AND user_id = ?");
$stmt->execute([$id, $user_id]);

echo json_encode(["message" => "Checklist deleted"]);
