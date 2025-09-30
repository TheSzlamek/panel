<?php
session_start();
session_destroy();
header("Location: login.php?msg=" . urlencode("Wylogowano"));
exit;

