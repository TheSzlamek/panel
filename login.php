<?php
session_start();

$stored = trim(file_get_contents(__DIR__ . '/password.txt'));
$msg = "";

// Wylogowanie
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

// Próba logowania
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entered = $_POST['password'] ?? '';
    if ($entered === $stored) {
        $_SESSION['logged_in'] = true;
    } else {
        $msg = "Błędne hasło!";
    }
}

// Jeśli zalogowany → pokaż panel
if (!empty($_SESSION['logged_in'])):
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Panel</title></head>
<body>
<h2>Witaj w panelu!</h2>
<p>To jest Twoja zawartość panelu.</p>
<p>
    <a href="index.php?logout=1">Wyloguj</a> | 
    <a href="change_password.php">Zmień hasło</a>
</p>
</body>
</html>

<?php else: ?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Logowanie</title></head>
<body>
<h2>Logowanie</h2>
<?php if ($msg): ?><p style="color:red;"><?=$msg?></p><?php endif; ?>
<form method="post">
    <label>Hasło: <input type="password" name="password" required></label>
    <button type="submit">Zaloguj</button>
</form>
</body>
</html>
<?php endif; ?>

