<?php

  session_start();

  $age = $_POST['age'];
  $message = array();

  if (!is_numeric($age)) {
    $_SESSION['message'][] = "please enter a number";
  } 

  if ($age < 5) {
    $_SESSION['message'][] = "uh, you're too young.";
  }

  if (count($_SESSION['message']) > 0) {
    header('Location: comment.php');
    exit;
  }

  // grab data from the $_POST 
  $comment = $_POST['comment'];

  if ($comment == "") {
    $_SESSION['message'][] = "uh, please enter something.";
  } 
   

  require_once 'Dao.php';
  $dao = new Dao();
  $dao->saveComment($comment);
  header('Location: comment.php');
  exit;
