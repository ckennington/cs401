<?php
session_start();

require_once 'KLogger.php';
$logger = new KLogger ("log.txt" , KLogger::WARN);

$username = $_POST['username'];
$password = $_POST['password'];
$logger->LogDebug("User [{$username}] attempting to log in");

// check the database
if ($username == 'conradkennington@gmail.com' && $password == 'abc123') {
  $_SESSION['auth'] = true;
  header("Location: comments.php");
  exit();
} else {
  $logger->LogWarn("User [{$username}] invalid username or password");
  $_SESSION['message'] = 'Invalid Username or password';
  header("Location: comments.php");
  exit();
}
