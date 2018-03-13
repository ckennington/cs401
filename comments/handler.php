<?php
  session_start();
  require_once '../Dao.php';
  $dao = new Dao();

  #echo "<pre>" . print_r($_FILES, 1) . "</pre>";
  #exit;

  $name = $_POST["name"];
  $age = $_POST["age"];
  $comment = $_POST["comment"];

  $_SESSION['presets'] = array($_POST);

  $valid = true;
  $messages = array();
  if (empty($name)) {
    $messages[] = "PLEASE ENTER A NAME";
    $valid = false;
  }

  if (!is_numeric($age)) {
    $messages[] = "PLEASE ENTER A NUMBER FOR YOUR AGE";
    $valid = false;
  }

  if ($age < 18) {
    $messages[] = "GO TO BED! i'm telling your mom";
    $valid = false;
  }

  if (empty($comment)) {
    $messages[] = "PLEASE ENTER A COMMENT";
    $valid = false;
  }

  if (!$valid) {
    $_SESSION['sentiment'] = "bad";
    $_SESSION['messages'] = $messages;
    header("Location: comments.php");
    exit;
  }
  $_SESSION['sentiment'] = "good";
  $_SESSION['messages'] = array("Nice post. Good on ya.");

  // save image to database
  $basePath = "/Users/crk/projects/cs401/src/www";
  $imagePath = "/comments/images/" . $_FILES["fileToUpload"]["name"];
  if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $basePath . $imagePath)) {
    throw new Exception("File move failed");
  }

  $comment = $_POST["comment"];
  $dao->saveComment($name, $comment, $imagePath);

  header("Location: comments.php");
  exit;
