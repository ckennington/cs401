<?php
session_start();
?>
<html>
  <head>
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
    <h1>Login Page</h1>
    <form method="post" action="handler.php">
      <div>Username: <input type="text" name="username"></div>
      <div>Password: <input type="password" name="password"></div>
      <?php
      if (isset($_SESSION['message'])) {
        echo "<div id='message'>" . $_SESSION['message'] . "</div>";
      }
      unset($_SESSION['message']);
      ?>
      <div><input type="submit" value="Login"></div>
    </form>
  </body>
</html>
