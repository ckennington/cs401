<?php
  session_start();
  require_once 'Dao.php';

  $name = $_POST['name'];
  $comment = $_POST['comment'];
  $rating = $_POST['rating'];

  if(0 == strlen($comment)) {
    $_SESSION['message'] = "please enter a comment";
    header("Location: http://localhost/black_market/comments.php");
    exit();
  }

  $dao = new Dao();
  $dao->saveComment($name, $comment);

  header("Location: http://localhost/black_market/comments.php");
  exit();
