<?php
  session_start();
  // Pretend i'm looking this up in a database
  $password_in_the_database = "abc123";

  if ($password_in_the_database != $_POST["password"]) {
    $_SESSION['message'] = "Error, the password was incorrect.";
    header("Location: login.php");
    exit();
  } else {
    $_SESSION['logged_in'] = true;
    header("Location: student_list.php");
  }

