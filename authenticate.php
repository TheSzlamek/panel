<?php
session_start();
$stored = trim(file_get_contents(__DIR__ . '/password.txt'));

$entered = $_POST['password'] ?? '';
if ($entered === $stored) {
    $_SESSION['logged_in'] = true;
    header("Location: panel.php");
    exit;
} else {
    header("Location: login.php?msg=" . urlencode("Błędne hasło"));
    exit;
}
