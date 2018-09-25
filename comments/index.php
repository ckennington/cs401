<html>
  <head>
    <link href="comments.css" type="text/css" rel="stylesheet" />
  </head>
  <body>
    <h1>Comments</h1>
    <h2>Leave a Comment</h2>
    <form method="post" action="handler.php">
			Name:<br>
			<input type="text" name="name"><br>
			Comment:<br>
			<input type="text" name="comment">
      <input type="submit" value="Submit">
    </form>

    <table>
<?php
    $comments = trim(file_get_contents("comments.txt"));
    $lines = array_reverse(explode("\n", $comments));
    foreach ($lines as $line) {
      $elements = explode("|", $line);
      echo "<tr><td>{$elements[0]}</td><td>{$elements[1]}</td></tr>";
    }
?>
    </table>

  </body>
</html>
