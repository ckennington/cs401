<?php
  session_start();

  require_once 'classes/Dao.php';
  $dao = new Dao();

  $comment = htmlentities($_POST['comment']);
  $age = htmlentities($_POST['age']);

  if ($age < 12) {
    $_SESSION['message'] = "Go to bed. Or I'll tell your mom, $age-year-old";
    $_SESSION['mtype'] = 'bad';
    $_SESSION['inputs'] = $_POST;
    header("Location:comments.php");
    exit;
  } else {
    unset($_SESSION['inputs']);
    $_SESSION['message'] = "Message posted.";
    $_SESSION['mtype'] = 'good';
  }

  $tmp_name = $_FILES['pic']['tmp_name'];
  $name = $_FILES['pic']['name'];
  $upload_location = "/Users/crk/projects/cs401/src/www/cats/uploads/$name";
  $image_friendly_location = "/cats/uploads/$name";
  move_uploaded_file($tmp_name, $upload_location);

  $dao->saveComment($comment, $image_friendly_location);

  header("Location:comments.php");
  exit;
