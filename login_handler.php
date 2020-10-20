<?php
session_start();

// pretend like we did this:
// require_once 'Dao.php';
// $dao = new Dao();
// if ($dao->userExists($_POST['email'], $_POST['password'])) {
//    // authenticated!
// } else {
//   redirect back to login form with an error
// }

if (($_POST['email'] == 'conradkennington@gmail.com') && ($_POST['password'] == 'abc123')) {
  $_SESSION['authenticated'] = true;
  header("Location: http://cs401/comments.php");
} else {
  $_SESSION['authenticated'] = false;
  header("Location: http://cs401/login.php");
  exit();
}
