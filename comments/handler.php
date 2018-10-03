<?php
session_start();
$name = $_POST['name'];
$comment = $_POST['comment'];

$messages = array();
$bad = false;
if (empty($name)) {
  $_SESSION['messages'][] = "Name is required.";
  $bad = true;
}

if (empty($comment)) {
  $_SESSION['messages'][] = "Comment is required.";
  $bad = true;
}

if ($bad) {
  header('Location: http://cs401/comments');
  exit;
}

require_once 'Comments_Dao.php';
$dao = new Comments_Dao();
$dao->saveComment($name, $comment);

header('Location: http://cs401/comments');
exit;
