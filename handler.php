<?php

  session_start();

 // echo "<pre>" . print_r($_FILES,1) . "</pre>";
//exit;

  $age = $_POST['age'];

  if (!is_numeric($age)) {
    $_SESSION['message'][] = "please enter a number";
  } 

  if ($age < 5) {
    $_SESSION['message'][] = "uh, you're too young.";
  }

  // grab data from the $_POST 
  $comment = $_POST['comment'];

  if ($comment == "") {
    $_SESSION['message'][] = "uh, please enter a comment.";
  } 

  $imagePath = '';
  if (count($_FILES) > 0) {
    if ($_FILES["myfile"]["error"] > 0) {
    } else {
      $basePath = "/Library/WebServer/Documents";
      $imagePath = "/user_images/" . uniqid() . ".png";
      if (!move_uploaded_file($_FILES["myfile"]["tmp_name"], $basePath . $imagePath)) {
        throw new Exception("File move failed");
      }
    }
  }
   

  if (isset($_SESSION['message'])) {
    header('Location: comment.php');
    $_SESSION['sentiment'] = 'bad';
    $_SESSION['post'] = $_POST;
    exit;
  }
  $_SESSION['sentiment'] = 'good';
  $_SESSION['message'][] = "Thanks for commening!";

  unset($_SESSION['post']);

  require_once 'Dao.php';
  $dao = new Dao();
  $dao->saveComment($comment, $imagePath);
  header('Location: comment.php');
  exit;
