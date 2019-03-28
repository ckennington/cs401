<?php
session_start();
//echo "<pre>" .print_r($_SESSION,1) ."</pre>";
?>

<html>
  <head>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1>Create a User</h1>
    <form method="post" action="create_user_handler.php" enctype="multipart/form-data">
      <div><label for="username">Username:</label>
        <input value="<?php echo isset($_SESSION['form_input']['username']) ? $_SESSION['form_input']['username'] : ''; ?>" type="text" id="username" name="username"></div>
      <div><label for="password1">Password:</label> <input type="password" id="password1" name="password1"></div>
      <div><label for="password2">Retype Password:</label> <input type="password" id="password2" name="password2"></div>
      <div><label for="file">Image:</label><input type="file" name="file" id="file"></div>
      <?php
      if (isset($_SESSION['messages'])) {
        foreach($_SESSION['messages'] as $message) {
          echo "<div class='message bad'>{$message}</div>";
        }
      }
      unset($_SESSION['message']);
      unset($_SESSION['form_input']);
      ?>
      <div><input type="submit" value="Create User"></div>
    </form>
  </body>
</html>

