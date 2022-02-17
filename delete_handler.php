<?php

  require_once 'Dao.php';
  $dao = new Dao();
  $dao->deleteComment($_GET['id']);
  header('Location: comment.php');
  exit;
