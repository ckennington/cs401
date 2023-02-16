<?php
  require_once 'Dao.php';

  $id = $_GET['id'];

  $dao = new Dao();
  $dao->deleteComment($id);
  header("Location: comments.php");
  exit();
