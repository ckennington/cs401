<?php
session_start();
if (isset($_SESSION['logged_in'])) {
  echo "logged in!";
  echo "<a href='logout.php'>Logout</a>";
} else {
  header("Location:login.php");
  exit;
}
