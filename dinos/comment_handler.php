<?php
  session_start();
  require_once 'Dao.php';

  sleep(2);

  $comment = $_POST['comment'];
  $_SESSION['inputs'] = $_POST;
  $_SESSION['message_type'] = "happy";

  $dao = new Dao();
  $dao->saveComment($comment, $imagePath);
  #$_SESSION['message'] = "Thanks for posting!";
  #header("Location: comments.php");
  exit();
