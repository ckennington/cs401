<?php

  require_once 'Dao.php';

  $name = $_POST['name'];
  $comment = $_POST['comment'];
  $rating = $_POST['rating'];

  //file_put_contents("comments.log", "{$name}|{$comment}|{$rating}\n" ,FILE_APPEND);
  $dao = new Dao();
  $dao->saveComment($name, $comment);

  header("Location: http://localhost/black_market/comments.php");
  exit();
