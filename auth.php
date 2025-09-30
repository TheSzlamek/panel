<?php
session_start();
$entered = $_POST['password'] ?? '';
$stored = trim(file_get_contents(__DIR__ . '/password.txt'));

if ($entered === $stored) {
    $_SESSION['logged_in'] = true;
    header("Location: panel.php");
    exit;
} else {
    header("Location: login.php?msg=" . urlencode("Błędne hasło"));
    exit;
}
