<?php
  require_once 'classes/Dao.php';
  $dao = new Dao();

  $comment = $_POST['comment'];
  $dao->saveComment($comment);

  header("Location:comments.php");
  exit;
