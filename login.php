<?php
session_start();

// Wczytanie hasła z pliku (np. haslo.txt)
$storedPassword = trim(file_get_contents("password.txt"));

// Hasło wpisane w formularzu
$inputPassword = $_POST['password'] ?? "";

// Sprawdzenie
if ($inputPassword === $storedPassword) {
    $_SESSION['logged_in'] = true;
    header("Location: panel.php"); // przenosi do panelu
    exit;
} else {
    echo "Nieprawidłowe hasło!";
}
?>


