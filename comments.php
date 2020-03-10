<?php
  session_start();

  // check if user is authenticated
  if (!isset($_SESSION['auth']) || !$_SESSION['auth'])  {
    header("Location: http://cs401/login.php");
    exit;
  }

  require_once 'Dao.php';
  $dao = new Dao();
?>
<html>
  <head>
    <title>Leave a comment</title>
    <link rel="stylesheet" type="text/css" href="comment.css">
  </head>
  <body>
    <div id="logout"><a href="http://cs401/logout.php">logout</a></div>
    <h1>Leave a Comment</h1>
    <form method="POST" action="comment_handler.php">
        <div>Name: <input type="text" id="username" name="username"></div>
        <div>Comment: <input type="text" id="comment" name="comment"></div>
        <input type="submit" value="Submit">
    </form>
    <?php
    if (isset($_SESSION['error'])) {
      echo "<div id='error'>{$_SESSION['error']}</div>";
      unset($_SESSION['error']);
    } ?>
    <table>
      <thead>
        <tr>
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
           echo "<tr><td>" . $line['comment'] . "</td><td>{$line['date_entered']}</td><td class='delete'><a href='delete_comment.php?id={$line['comment_id']}'>X</a></td></tr>";
          }
      }
      ?>
      </tbody>
    </table>

  </body>
</html>
