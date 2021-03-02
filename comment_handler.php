<?php

  require_once 'KLogger.php';
  $logger = new KLogger ( "log.txt" , KLogger::WARN );
  $errors = array();

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
    header('Location: comments.php');
    exit;
  }

  require_once 'Dao.php';
  $dao = new Dao();
  $dao->insertComment($_POST['name'], $_POST['comment']);

  header('Location: comments.php');
  exit;
