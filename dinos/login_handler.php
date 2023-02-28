<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// check the database
if ($username == 'conradkennington@gmail.com' && $password == 'abc123') {
  $_SESSION['auth'] = true;
  header("Location: comments.php");
  exit();
} else {
  $_SESSION['message'] = 'Invalid Username or password';
  header("Location: login.php");
  exit();
}
