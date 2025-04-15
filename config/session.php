<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo json_encode(["message" => "Unauthorized"]);
    exit;
}
$user_id = $_SESSION['user_id'];
