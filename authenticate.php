<?php
session_start();

// wczytanie hasła z pliku
$stored = file_get_contents(__DIR__ . '/password.txt');
// usuń końce linii
$stored = str_replace(["\r","\n"], '', $stored);

// hasło wpisane w formularzu
$entered = trim($_POST['password'] ?? '');

// sprawdzenie
if ($entered === $stored) {
    $_SESSION['logged_in'] = true;
    header("Location: panel.php");
    exit;
} else {
    header("Location: login.php?msg=" . urlencode("Błędne hasło"));
    exit;
}



