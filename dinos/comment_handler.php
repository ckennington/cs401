<?php
  require_once 'Dao.php';

  $comment = $_POST['comment'];
  $dao = new Dao();
  $dao->saveComment($comment);
  header("Location: comments.php");
  exit();
