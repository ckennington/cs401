<?php
  require_once '../Dao.php';
  $dao = new Dao();

  $name = $_POST["name"];
  $age = $_POST["age"];
  $comment = $_POST["comment"];

  $valid = true;
  $errors = array();
  if (empty($name)) {
    $errors[] = "PLEASE ENTER A NAME";
    $valid = false;
  }

  if (!is_numeric($age)) {
    $errors[] = "PLEASE ENTER A NUMBER FOR YOUR AGE";
    $valid = false;
  }

  if ($age < 18) {
    $errors[] = "GO TO BED! i'm telling your mom";
    $valid = false;
  }

  if (empty($comment)) {
    $errors[] = "PLEASE ENTER A COMMENT";
    $valid = false;
  }

  if (!$valid) {
    echo "<pre>" . print_r($errors, 1) . "</pre>";
    exit;

  }

  $comment = $_POST["comment"];
  $dao->saveComment($name, $comment);

  header("Location: comments.php");
  exit;
