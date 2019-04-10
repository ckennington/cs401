<?php
session_start();

$comment = $_POST['comment'];

// Good place to validate
if (64 < strlen($comment)) {
  echo "comment was too long. please shorten it.";
  exit;
}

if (0 >= strlen($comment)) {
  $_SESSION['good'] = false;
  $_SESSION['message'] = "Please enter a comment";
  //header("Location: comment.php");
  exit;
}

require_once 'Dao.php';
$dao = new Dao();
$dao->saveComment($comment);

$_SESSION['message'] = "Thanks for posting!";
$_SESSION['good'] = true;
//header('Location: comment.php');
exit;
