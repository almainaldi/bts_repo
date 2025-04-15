<?php
require "../config/session.php";
require "../config/db.php";

$id = $_POST['id'] ?? '';
$name = $_POST['name'] ?? '';

$stmt = $conn->prepare("UPDATE items SET name = ? WHERE id = ?");
$stmt->execute([$name, $id]);

echo json_encode(["message" => "Item updated"]);
