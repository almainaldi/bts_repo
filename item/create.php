<?php
require "../config/session.php";
require "../config/db.php";

$name = $_POST['name'] ?? '';
$checklist_id = $_POST['checklist_id'] ?? '';

$stmt = $conn->prepare("INSERT INTO items (checklist_id, name) VALUES (?, ?)");
$stmt->execute([$checklist_id, $name]);

echo json_encode(["message" => "Item added"]);
