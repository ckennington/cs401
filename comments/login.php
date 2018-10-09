<?php
session_start();

$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
unset($_SESSION['message']);
?>

<html>
  <head>
    <link href="comments.css" type="text/css" rel="stylesheet" />
  </head>
  <body>
<h1>Login page</h1>

<?php if(!empty($message)) { ?>
<div class="message"><?php echo $message; ?></div>
<?php } ?>
<form method="post" action="login_handler.php">
			Login:<br>
			<input type="text" name="login" value=""><br>
			password:<br>
			<input type="password" name="password">
      <input type="submit" value="Submit">
</form>
</body>
</html>
