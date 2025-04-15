<?php
require "../config/session.php";
require "../config/db.php";

$stmt = $conn->prepare("SELECT id, title FROM checklists WHERE user_id = ?");
$stmt->execute([$user_id]);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
