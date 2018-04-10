<?php
  session_start();
?>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link href="https://fonts.googleapis.com/css?family=Mountains+of+Christmas" rel="stylesheet"> </head>
    <link href="https://fonts.googleapis.com/css?family=Hi+Melody" rel="stylesheet">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/login.js"></script>
  </head>
  <body>
    <h2>LOGIN!</h2>
<?php
if (isset($_SESSION['message'])) { ?>
<div id="message"><?php
  foreach ($_SESSION['message'] as $message) {
    echo "<span id='close'>X</span><div>" . $message . "</div>";
 }
  unset($_SESSION['message']); ?>
  </div>
<?php } ?>
    <form method="post" action="login_handler.php">
      <div><label for="email">email:</label> <input id="email" value="<?php echo isset($_SESSION['presets']['email']) ? $_SESSION['presets']['email'] : ""; ?>" type="text" name="email"></div>
      <div><label for="password">password:</label> <input id="password" type="password" name="password"></div>
      <div><input type="submit" value="login"></div>
    </form>
  </body>
</html>

