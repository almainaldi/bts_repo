<?php
require "../config/session.php";
require "../config/db.php";

$title = $_POST['title'] ?? '';
if (!$title) {
    echo json_encode(["message" => "Title required"]);
    exit;
}

$stmt = $conn->prepare("INSERT INTO checklists (user_id, title) VALUES (?, ?)");
$stmt->execute([$user_id, $title]);

echo json_encode(["message" => "Checklist created"]);
