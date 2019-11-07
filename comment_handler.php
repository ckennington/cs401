<?php
   session_start();

   $messages = array();
   $presets = $_POST;
   $sentiment = '';

   $age = $_POST['age'];
   if (!is_numeric($age)) {
     $messages[] = "NOT AN AGE!";
     unset($presets['age']);
   }

   if (is_numeric($age) && $age < 12) {
     $messages[] = "NOT OLD ENOUGH!!";
     unset($presets['age']);
   }

   if (empty($_POST['comment'])) {
     $messages[] = "Please leave a comment. THANKS!";
     unset($presets['comment']);
   }

   if (count($messages) > 0) {
     $_SESSION['messages'] = $messages;
     $_SESSION['form_data'] = $presets;
     $_SESSION['sentiment'] = 'bad';
     header("Location: http://cs401/comments.php");
     exit;
   }
   unset($_SESSION['messages']);
   unset($_SESSION['form_data']);

   require_once 'Dao.php';
   $dao = new Dao();
   $dao->saveComment($_POST['comment']);
   $_SESSION['messages'] = array("Your comment has been posted");
   $_SESSION['sentiment'] = 'good';
   sleep(3);
   //header("Location: http://cs401/comments.php");
?>
