<?php
  $comment = $_POST['comment'];
  file_put_contents('comments.log', $comment.PHP_EOL , FILE_APPEND | LOCK_EX);
  header("Location: comments.php");
  exit();
