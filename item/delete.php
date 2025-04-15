<?php
require "../config/session.php";
require "../config/db.php";

$id = $_POST['id'] ?? '';
$stmt = $conn->prepare("DELETE FROM items WHERE id = ?");
$stmt->execute([$id]);

echo json_encode(["message" => "Item deleted"]);
