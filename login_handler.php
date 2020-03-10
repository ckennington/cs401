<?php
  session_start();

 // probably check in a database using "userExists($username, $password)" or something
 // BUT... i'll just hardcode it for now...


  $username = "conradkennington@gmail.com";
  $password = "abc123";

  if ($username == $_POST['username'] && $password == $_POST['password']) {
    $_SESSION['auth'] = true;
    header("Location: http://cs401/comments.php");
    exit;
  } else {
    $_SESSION['auth'] = false;
    $_SESSION['message'] = "Invalid username or password";
    header("Location: http://cs401/login.php");
  }
