<?php
  session_start();
  require_once 'Dao.php';

  $comment = $_POST['comment'];

  if (strlen($comment) > 200) {
    $_SESSION['message'] = "Comment too long!";
    header("Location: comments.php");
    exit();
  }

  $dao = new Dao();
  $dao->saveComment(htmlspecialchars($comment));
  header("Location: comments.php");
  exit();
