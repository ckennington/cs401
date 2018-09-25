<?php
$name = $_POST['name'];
$comment = $_POST['comment'];

file_put_contents("comments.txt", "{$name}|{$comment}\n", FILE_APPEND | LOCK_EX);
header('Location: http://cs401/comments
  ');
exit;
