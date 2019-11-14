<?php
session_start();
if (!isset($_SESSION['logged_in']) || true !== $_SESSION['logged_in']) {
  header("Location: http://cs401/login.php");
  exit;
}

echo "ACCESS GRANTED ... Welcome {$_SESSION['username']} ";
?>
<a id="logout" href="logout_handler.php">Logout</a>

