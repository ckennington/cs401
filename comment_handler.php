<?php
  //session_start();

  //echo "<pre>" . print_r($_FILES,1) . "</pre>";
  //exit;
  /*
  $errors = array();

  // validate
  $username = $_POST['username'];
  if(!ctype_alpha($username)) {
    $errors[] = "Error, alpha characters only in the name";
  }

  if (strlen($_POST['comment']) > 256) {
    $errors[] = "Error, comment can only be 256 characters long";
  }

  if (strlen($_POST['comment']) ==  0) {
    $errors[] = "Error, please leave a comment";
  }

  if (0 < count($errors)) {
    $_SESSION['form'] = $_POST;
    $_SESSION['errors'] = $errors;
    header("Location: http://cs401/comments.php");
    exit;
  }

  // check the uploaded file, and move it if needed.
  $relative_path = "";
  if (!empty($_FILES)){
    $relative_path = "/uploads/" . uniqid() . ".png";
    $absolute_path = "/Users/crk/projects/cs401/src/www" . $relative_path;
    $moved = move_uploaded_file ($_FILES['img']['tmp_name'], $absolute_path);
  }

  unset($_SESSION['form']);
   */

  require_once 'Dao.php';
  $dao = new Dao();
  $dao->saveComment($_POST['comment'], $relative_path);
  //header("Location: http://cs401/comments.php");
  exit;
