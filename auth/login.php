<?php
require "../config/db.php";
session_start();

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];

    header("Location: ../public/index.html");
    exit;
} else {
    echo "<script>alert('Login gagal: username atau password salah'); window.location.href='../public/login.html';</script>";
}
