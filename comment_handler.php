<?php

  require_once 'Dao.php';
  $dao = new Dao();
  $dao->insertComment($_POST['name'], $_POST['comment']);

  header('Location: comments.php');
  exit;
