<?php
  $comment = $_POST['comment'];
  $age = $_POST['age'];
  $line = "$comment|$age\n";
  file_put_contents("cats.data", $line, FILE_APPEND);
  header("Location:comments.php");
  exit;
