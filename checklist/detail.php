<?php
require "../config/session.php";
require "../config/db.php";

$checklist_id = $_GET['id'] ?? '';
$stmt = $conn->prepare("SELECT * FROM items WHERE checklist_id = ?");
$stmt->execute([$checklist_id]);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
