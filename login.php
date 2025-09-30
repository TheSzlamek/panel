<?php
session_start();
if (!empty($_SESSION['logged_in'])) {
    header("Location: panel.php");
    exit;
}
$msg = $_GET['msg'] ?? '';
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Logowanie</title></head>
<body>
<h2>Logowanie</h2>
<?php if ($msg): ?><p style="color:red;"><?=htmlspecialchars($msg)?></p><?php endif; ?>
<form method="post" action="auth.php">
    <label>Hasło: <input type="password" name="password" required></label><br><br>
    <button type="submit">Zaloguj</button>
</form>
</body>
</html>
