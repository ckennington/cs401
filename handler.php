<?php
  // Pretend i'm looking this up in a database
  $password_in_the_database = "abc123";

  if ($password_in_the_database != $_POST["password"]) {
    header("Location: login.php");
    exit();
  } else {
    header("Location: student_list.php");
  }

