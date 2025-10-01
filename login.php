<?php
session_start();

// Ścieżka do pliku z hasłem.
// ZALECANE: umieść password.txt poza katalogiem publicznym i tu podaj absolutną ścieżkę, np. "/home/user/password.txt"
$passFile = __DIR__ . '/password.txt';

// Sprawdź metoda POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.html');
    exit;
}

$input = $_POST['password'] ?? '';
$input = (string)$input;

// Wczytaj hasło z pliku
if (!file_exists($passFile)) {
    // plik nie istnieje -> błąd
    $err = 'Błąd: brak pliku password.txt';
    header('Location: login.html?error=' . urlencode($err));
    exit;
}

$stored = file_get_contents($passFile);
if ($stored === false) {
    $err = 'Błąd odczytu pliku z hasłem';
    header('Location: login.html?error=' . urlencode($err));
    exit;
}
$stored = trim($stored);

// Jeśli w pliku jest hash bcrypt (rozpoczynający się od $2y$ lub $2a$ itp.), użyj password_verify
$logged = false;
if (strlen($stored) > 0 && (strpos($stored, '$2y$') === 0 || strpos($stored, '$2a$') === 0 || strpos($stored, '$2b$') === 0)) {
    // bcrypt
    if (password_verify($input, $stored)) {
        $logged = true;
    }
} else {
    // zwykły tekst — bezpieczniejsze porównanie z hash_equals
    // użyjemy sha256 porównania, żeby uniknąć wycieków timingowych
    $inputHash = hash('sha256', $input);
    $storedHash = hash('sha256', $stored);
    if (hash_equals($storedHash, $inputHash)) {
        $logged = true;
    }
}

if ($logged) {
    // zaloguj
    session_regenerate_id(true);
    $_SESSION['logged_in'] = true;
    $_SESSION['logged_at'] = time();
    header('Location: panel.php');
    exit;
} else {
    $err = 'Nieprawidłowe hasło';
    header('Location: login.html?error=' . urlencode($err));
    exit;
}



