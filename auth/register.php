<?php
require "../config/db.php";
session_start();

$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (!$username || !$email || !$password) {
    echo "<script>alert('Semua field wajib diisi'); window.location.href='../public/register.html';</script>";
    exit;
}

// Cek apakah username atau email sudah dipakai
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
$stmt->execute([$username, $email]);

if ($stmt->rowCount() > 0) {
    echo "<script>alert('Username atau email sudah terdaftar'); window.location.href='../public/register.html';</script>";
    exit;
}

$hash = password_hash($password, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->execute([$username, $email, $hash]);

echo "<script>alert('Registrasi berhasil, silakan login'); window.location.href='../public/login.html';</script>";
