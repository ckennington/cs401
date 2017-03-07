<?php
  session_start();

  require_once 'classes/Dao.php';
  $dao = new Dao();

  $comment = htmlentities($_POST['comment']);
  $age = htmlentities($_POST['age']);

  if ($age < 12) {
    $_SESSION['message'] = "Go to bed. Or I'll tell your mom, $age-year-old";
    $_SESSION['mtype'] = 'bad';
  } else {
    $_SESSION['message'] = "Message posted.";
    $_SESSION['mtype'] = 'good';
  }

  $dao->saveComment($comment);

  header("Location:comments.php");
  exit;
