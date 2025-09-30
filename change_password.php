<?php
session_start();
if (empty($_SESSION['logged_in'])) {
    header("Location: login.php?msg=" . urlencode("Najpierw się zaloguj"));
    exit;
}

$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current = $_POST['current'] ?? '';
    $new = $_POST['new'] ?? '';
    $confirm = $_POST['confirm'] ?? '';

    $stored = trim(file_get_contents(__DIR__ . '/password.txt'));

    if ($current !== $stored) {
        $msg = "Błędne obecne hasło.";
    } elseif ($new === '' || $new !== $confirm) {
        $msg = "Nowe hasła nie są identyczne lub puste.";
    } else {
        file_put_contents(__DIR__ . '/password.txt', $new);
        $msg = "Hasło zmienione pomyślnie!";
    }
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Zmiana hasła</title></head>
<body>
<h2>Zmiana hasła</h2>
<?php if ($msg): ?><p style="color:green;"><?=htmlspecialchars($msg)?></p><?php endif; ?>
<form method="post">
    <label>Aktualne hasło: <input type="password" name="current" required></label><br><br>
    <label>Nowe hasło: <input type="password" name="new" required></label><br><br>
    <label>Powtórz nowe hasło: <input type="password" name="confirm" required></label><br><br>
    <button type="submit">Zmień hasło</button>
</form>
<p><a href="panel.php">Powrót do panelu</a></p>
</body>
</html>
