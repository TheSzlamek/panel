<?php
session_start();

// Pobranie hasła z pliku
$stored = file_get_contents(__DIR__ . '/password.txt');

// Usuń wszystkie końce linii i spacje
$stored = str_replace(["\r", "\n", " "], '', $stored);

$entered = $_POST['password'] ?? '';
$entered = trim($entered); // usuwa spacje z początku i końca

if ($entered === $stored) {
    $_SESSION['logged_in'] = true;
    header("Location: panel.php");
    exit;
} else {
    header("Location: login.php?msg=" . urlencode("Błędne hasło"));
    exit;
}


