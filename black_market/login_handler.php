<?php
  session_start();

  $username = $_POST['username'];
  $password = $_POST['password'];
   
  if ($username == 'conrad' && $password == 'abc123') {
    $_SESSION['authenticated'] = true;
    header("Location: http://localhost/black_market/comments.php");
    exit();
  } else {
    header("Location: http://localhost/black_market/login.php");
    exit();
  }
