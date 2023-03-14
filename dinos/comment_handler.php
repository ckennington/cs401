<?php
  session_start();
  require_once 'Dao.php';

  $comment = $_POST['comment'];
  $_SESSION['inputs'] = $_POST;

  if (strlen($comment) > 200) {
    $_SESSION['message'] = "Comment too long!";
    header("Location: comments.php");
    exit();
  }

  if (empty($comment)) {
    $_SESSION['message'] = "Please enter a comment";
    header("Location: comments.php");
    exit();
  }

 $imagePath = '';
echo print_r($_FILES,1);
  if (count($_FILES) > 0) {
    if ($_FILES["myfile"]["error"] > 0) {
    } else {
      $basePath = "/Library/WebServer/Documents";
      $imagePath = "/dinos/user_images/" . uniqid() . ".gif";
      if (!move_uploaded_file($_FILES["myfile"]["tmp_name"], $basePath . $imagePath)) {
        throw new Exception("File move failed");
      }
    }
  }

  $dao = new Dao();
  $dao->saveComment($comment, $imagePath);
  header("Location: comments.php");
  exit();
