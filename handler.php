<?php

  // grab data from the $_POST 
  $comment = $_POST['comment'];

  require_once 'Dao.php';
  $dao = new Dao();
  $dao->saveComment($comment);
  header('Location: comment.php');
  exit;
