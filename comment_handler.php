<?php

require_once 'Dao.php';
require_once 'KLogger.php';
$logger = new KLogger ("log.txt" , KLogger::DEBUG);

// validating
if (!is_numeric($_POST['age'])) {
  echo "Invalid age.";
  $logger->LogInfo("User entered invalid age [{$_POST['age']}]");
  //header("Location: http://cs401/comments.php");
  exit();
}

if ($_POST['age'] < 2) {
  echo "Sorry, you need to be at least 2 years old to comment.";
  //header("Location: http://cs401/comments.php");
  exit();
}

if (strlen($_POST['comment']) > 256) {
  echo "Comment is too long.";
  //header("Location: http://cs401/comments.php");
  exit();
}

$dao = new Dao();
$dao->addComment($_POST['comment']);

// redirect back to the comments page
header("Location: http://cs401/comments.php");
exit();
