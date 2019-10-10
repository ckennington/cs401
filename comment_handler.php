<?php
   session_start();

   $errors = array();

   $age = $_POST['age'];
   if (!is_numeric($age)) {
     $errors[] = "NOT AN AGE!";
   }

   if (is_numeric($age) && $age < 12) {
     $errors[] = "NOT OLD ENOUGH!!";
   }

   if (empty($_POST['comment'])) {
     $errors[] = "Please leave a comment. THANKS!";
   }

   if (count($errors) > 0) {
     $_SESSION['errors'] = $errors;
     header("Location: http://cs401/comments.php");
     exit;
   }
   unset($_SESSION['errors']);

   require_once 'Dao.php';
   $dao = new Dao();
   $dao->saveComment($_POST['comment']);
   header("Location: http://cs401/comments.php");
?>
