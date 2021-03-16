<?php
  session_start();

  require_once 'KLogger.php';
  $logger = new KLogger ( "log.txt" , KLogger::WARN );
  $errors = array();

  //echo "<pre>" . print_r($_FILES,1) . "</pre>";
  $imagePath = '';
  if (count($_FILES) > 0) {
    if ($_FILES["fileToUpload"]["error"] > 0) {
      $logger->LogWarn("Error: " . $_FILES["fileToUpload"]["error"]);
    } else {
      $basePath = "/Users/crk/projects/cs401/src/www";
      $imagePath = "/images/" . uniqid() . ".png";
      if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $basePath . $imagePath)) {
        throw new Exception("File move failed");
      }
    }
  }

  $age = $_POST['age'];
  if (!is_numeric($age)) {
    $errors[] = "Sorry, invalid age - enter a number";
  }

  if ($age < 12) {
    $errors[] = "Sorry, you're not old enough to post";
  }

  if (strlen($_POST['name']) > 32) {
    $errors[] = "Sorry, your name is too long";
  }

  if (count($errors) > 0) {
    $logger->LogWarn(print_r($errors,1));
    $_SESSION['messages'] = $errors;
    $_SESSION['class'] = "bad_mojo";
    $_SESSION['form_data'] = $_POST;
    header('Location: comments.php');
    exit;
  } else {
    $_SESSION['class'] = "positive_vibes";
    $_SESSION['messages'] = array("Thanks for posting!");
    $_SESSION['form_data'] = array();
  }

  require_once 'Dao.php';
  $dao = new Dao();
  $dao->insertComment($_POST['name'], $_POST['comment'], $imagePath);

  header('Location: comments.php');
  exit;
