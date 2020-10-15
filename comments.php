<?php
session_start();
require_once 'table.php';

setcookie('cs401_cookies', 'poop');
?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="comment.css">
  </head>
  <body>
    <h1>Leave a Comment</h1>
    <form method="POST" action="comment_handler.php">
      <div>Name: <input type="text" name="name" id="name"/></div>
      <div>Age: <input type="text" name="age" id="age"/></div>
      <div>Comment: <input type="text" name="comment" id="comment"/></div>
      <input type="submit" value="Post a Comment">
    </form>
    <?php
    if (isset($_SESSION['good'])) {
      foreach ($_SESSION['good'] as $message) {
        echo "<div class='good'>{$message}</div>";
      }
      foreach ($_SESSION['bad'] as $message) {
        echo "<div class='bad'>{$message}</div>";
      }
    }

    ?>
      <?php
      renderTable("comments.txt");
      ?>
  </body>
</html>
