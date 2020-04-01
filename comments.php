<?php
  session_start();

  // check if user is authenticated
  if (!isset($_SESSION['auth']) || !$_SESSION['auth'])  {
    header("Location: http://cs401/login.php");
    exit;
  }

  require_once 'Dao.php';
  $dao = new Dao();

  $name_preset = "";
  $comment_preset = "";
  if (isset($_SESSION['form'])) {
    $name_preset = $_SESSION['form']['username'];
    $comment_preset = $_SESSION['form']['comment'];
  }
?>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/comments.js"></script>
    <title>Leave a comment</title>
    <link rel="stylesheet" type="text/css" href="comment.css">
  </head>
  <body>
    <div id="logout"><a href="http://cs401/logout.php">logout</a></div>
    <h1>Leave a Comment</h1>
    <form method="POST" action="comment_handler.php" enctype="multipart/form-data">
      <div>Name: <input value="<?php echo $name_preset; ?>" type="text" id="username" name="username"></div>
      <div>Comment: <input value="<?php echo $comment_preset; ?>" type="text" id="comment" name="comment"></div>
      <div>Upload image: <input type="file" id="img" name="img" accept="image/*"></div>
        <input type="submit" value="Submit">
    </form>
    <?php
    if (isset($_SESSION['errors'])) {
      foreach ($_SESSION['errors'] as $error) {
        echo "<div class='error'>{$error}<span class='close_error'>X</span></div>";
      }
      unset($_SESSION['errors']);
    } ?>
    <table>
      <thead>
        <tr>
          <th>Image</th>
          <th>Comment</th>
          <th>Date Entered</th>
          <th>delete</th>
       </tr>
      </thead>
      <tbody>
      <?php
         $lines = $dao->getComments();
  if (is_null($lines)) {
        echo "There was an error.";
  } else {
         foreach ($lines as $line) {
           echo "<tr><td><img src='" . $line['image'] . "'/></td><td>" . $line['comment'] . "</td><td>{$line['date_entered']}</td><td class='delete'><a href='delete_comment.php?id={$line['comment_id']}'>X</a></td></tr>";
          }
      }
      ?>
      </tbody>
    </table>

  </body>
</html>
