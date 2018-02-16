<?php
  require_once '../Dao.php';
  $dao = new Dao();

  $name = $_POST["name"];
  $comment = $_POST["comment"];
  $dao->saveComment($name, $comment);

  header("Location: comments.php");
  exit;
