<?php
session_start();

  // validate
  $username = $_POST['username'];
  if(!ctype_alpha($username)) {
    $error = "Error, alpha characters only in the name";
    $_SESSION['error'] = $error;
    header("Location: http://cs401/comments.php");
    exit;
  }

  if (strlen($_POST['comment']) > 256) {
    $error = "Error, comment can only be 256 characters long";
    $_SESSION['error'] = $error;
    header("Location: http://cs401/comments.php");
    exit;
  }

  require_once 'Dao.php';
  $dao = new Dao();
  $dao->saveComment($_POST['comment']);
  header("Location: http://cs401/comments.php");
  exit;
