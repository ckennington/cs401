<?php
session_start();

?>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="login.css">
  </head>
  <body>
    <h1>Login</h1>
    <?php
    if (isset($_SESSION['authenticated']) && !$_SESSION['authenticated']) {
       echo "<div class='bad'>Invalid Username or password</div>";
    }
    ?>
    <form method="post" action="login_handler.php">
      <div><label for="email">Enter your email:</label><input id="email" type="text" name="email"/></div>
      <div><label for="password">Enter your password:</label><input id="password" type="password" name="password"/></div>
      <div><input type="submit" value="Login"></div>
    </form>
  </body>
</html>
