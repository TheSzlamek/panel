<?php
session_start();
if (empty($_SESSION['logged_in'])) {
    header("Location: login.php?msg=" . urlencode("Najpierw się zaloguj"));
    exit;
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Panel</title>
</head>
<body>
<h2>Panel użytkownika</h2>
<p>To jest Twój panel. Możesz tutaj dodawać przyciski, linki, treści.</p>
<p>
    <a href="change_password.php">Zmień hasło</a> |
    <a href="logout.php">Wyloguj</a>
</p>
</body>
</html>

