<?php
session_start();

// Prosty limit czasu sesji (opcjonalne): 30 minut
$timeoutSeconds = 30 * 60;
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.html');
    exit;
}
if (isset($_SESSION['logged_at']) && (time() - $_SESSION['logged_at']) > $timeoutSeconds) {
    session_unset();
    session_destroy();
    header('Location: login.html?error=' . urlencode('Sesja wygasła, zaloguj się ponownie.'));
    exit;
}
// odśwież "last activity"
$_SESSION['logged_at'] = time();
?>
<!doctype html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Panel</title>
  <style>
    body{font-family: Arial, sans-serif;padding:24px;background:#f8fafc}
    .card{background:white;padding:20px;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,.06);max-width:800px;margin:40px auto}
    a.btn{display:inline-block;padding:8px 14px;background:#dc3545;color:white;border-radius:6px;text-decoration:none}
  </style>
</head>
<body>
  <div class="card">
    <h1>Panel użytkownika</h1>
    <p>Jesteś zalogowany. Tutaj umieść treść panelu.</p>
    <p><a class="btn" href="logout.php">Wyloguj</a></p>
  </div>
</body>
</html>




