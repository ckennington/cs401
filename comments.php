<?php
session_start();

// check for authentication
if (isset($_SESSION['authenticated']) && !$_SESSION['authenticated'] || !isset($_SESSION['authenticated'])) {
  header("Location: http://cs401/login.php");
}

require_once 'table.php';
?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="comment.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/myScript.js"></script>
  </head>
  <body>
    <span id="logout"><a href="logout.php">Logout</a></span>
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
        echo "<div class='bad'>{$message}<span class='fadeout'>X</span></div>";
      }
    }

    ?>
      <?php
      renderTable("comments.txt");
      ?>
  </body>
</html>
