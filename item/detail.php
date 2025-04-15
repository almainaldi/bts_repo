<?php
require "../middleware/auth.php";
require "../config/db.php";

$item_id = $_GET['id'] ?? null;

$stmt = $conn->prepare("SELECT * FROM items WHERE id = ?");
$stmt->execute([$item_id]);
$item = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($item);
?>
