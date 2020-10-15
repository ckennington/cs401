<?php
session_start();
require_once 'Dao.php';
require_once 'KLogger.php';
$logger = new KLogger ("log.txt" , KLogger::DEBUG);
$_SESSION['bad'] = array();
$_SESSION['good'] = array();

// validating
if (!is_numeric($_POST['age'])) {
  $logger->LogInfo("User entered invalid age [{$_POST['age']}]");
  $_SESSION['bad'][] = "Invalid age";
}

if ($_POST['age'] < 2) {
  $_SESSION['bad'][] = "Sorry, you need to be at least 2 years old to comment.";
}

if (strlen($_POST['comment']) == 0) {
  $_SESSION['bad'][] = "Please enter a comment";
}

if (strlen($_POST['comment']) > 256) {
  $_SESSION['bad'][] = "Comment is too long.";
}

if (count($_SESSION['bad']) > 0) {
  header("Location: http://cs401/comments.php");
  exit();
}

$dao = new Dao();
$dao->addComment($_POST['comment']);
$_SESSION['good'][] = "Thank you for posting";

// redirect back to the comments page
header("Location: http://cs401/comments.php");
exit();
