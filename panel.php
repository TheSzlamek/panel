<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.html");
    exit;
}
?>
<h1>Witaj w panelu!</h1>
<a href="logout.php">Wyloguj</a>



