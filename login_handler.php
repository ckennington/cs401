<?php
  session_start();
  require_once 'Dao.php';
  $dao = new Dao();

  // get post data from login form
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (0 === preg_match('/^.+@.+\.[A-Za-z]{1,5}$/', $email, $matches)) {
    $_SESSION['message'][] = "Invalid email address";
  }
  if (empty($password)) {
    $_SESSION['message'][] = "Missing password";
  }

  if (isset($_SESSION['message'])) {
    $_SESSION['presets']['email'] = $email;
    header("Location:login.php");
    exit;
  }

  // select user from database to see if they exist
  if ($dao->doesUserExist($email, $password)) {
    // if they exist, login
    $_SESSION['logged_in'] = true;
    header("Location:comments/comments.php");
    exit;
  } else {
    $_SESSION['presets']['email'] = $email;
    $_SESSION['message'][] = "Invalid username/password combo";
    header("Location:login.php");
    exit;
  }
