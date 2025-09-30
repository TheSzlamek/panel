<?php
session_start();

// Pobranie hasła z pliku
$stored = file_get_contents(__DIR__ . '/password.txt');
$stored = str_replace(["\r","\n"], '', $stored); // usuwa wszystkie nowe linie

$entered = $_POST['password'] ?? '';
if ($entered === $stored) {
    $_SESSION['logged_in'] = true;
    header("Location: panel.php");
    exit;
} else {
    header("Location: login.php?msg=" . urlencode("Błędne hasło"));
    exit;
}

