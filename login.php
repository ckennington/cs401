<?php
session_start();
?>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="comments.css">
  </head>
  <body>
<?php
if (isset($_SESSION['message'])) {
   echo "<div class='message bad'>{$_SESSION['message']}</div>";
}
?>
    <form method="POST" action="login_handler.php">
      <div>LOGIN</div>
      <input type="text" name="login"/>
      <div>PASSWORD</div>
      <div><input type="password" name="password"/></div>
      <div><input type="submit"/></div>
    </form>
  </body>
</html>
