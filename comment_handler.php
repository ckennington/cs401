<?php

$comment = $_POST['comment'];

// Good place to validate
if (64 < strlen($comment)) {
  echo "comment was too long. please shorten it.";
  exit;
}


require_once 'Dao.php';
$dao = new Dao();
$dao->saveComment($comment);

header('Location: comment.php');
exit;
