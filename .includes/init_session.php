<?php
session_start();
$penumpang_id = $_SESSION["penumpang_id"];
$nama = $_SESSION["name"];
$password = $_SESSION["password"];

$notification = $_SESSION['notification'] ?? null;
if ($notification) {
    unset($_SESSION['notification']);
}
if (empty($_SESSION["username"]) || empty( $_SESSION["role"])) {
    $_SESSION['notification'] = [
        'type' => 'danger',
        'message' => 'Silakan Login Terlebih Dahulu!'
    ];
    header('Location: ./auth/login.php');
}