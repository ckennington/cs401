<html>
  <head>
    <title>Leave a comment</title>
    <link rel="stylesheet" type="text/css" href="comment.css">
  </head>
  <body>
    <h1>Leave a Comment</h1>
    <form method="POST" action="comment_handler.php">
        <div>Name: <input type="text" id="username" name="username"></div>
        <div>Comment: <input type="text" id="comment" name="comment"></div>
        <input type="submit" value="Submit">
    </form>
    <table>
      <thead>
        <tr>
          <th>Username</th>
          <th>Comment</th>
       </tr>
      </thead>
      <tbody>
      <?php
      $lines = array_reverse(explode("\n", trim(file_get_contents ("comments.dat"))));
      foreach ($lines as $line) {
        list($username, $comment) = explode("|", $line);
        echo "<tr><td>{$username}</td><td>{$comment}</td></tr>";
      }
      ?>
      </tbody>
    </table>

  </body>
</html>
