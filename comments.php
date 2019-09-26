<html>
  <head>
    <link rel="stylesheet" type="text/css" href="comments.css">
  </head>
  <body>
    <h1>Leave a comment</h1>
    <form method="get">
      <div>Search for a comment</div>
      <input type="text" name="search">
      <input type="submit" value="Search">
    </form>
    <form action="comment_handler.php" method="post">
      <div>Leave a comment</div>
      <input type="text" name="comment">
      <input type="submit">
    </form>
    <?php
       $comments = explode("\n", trim(file_get_contents("comments.data")));
       if (count($comments) == 1 && empty($comments[0])) {
          echo "no comments yet!";
       } else {
         $comments = array_reverse($comments);
         echo "<table>";
         foreach($comments as $comment) {
            if (empty($_GET['search']) || strpos($comment, $_GET['search']) !== false ) {
               echo "<tr><td>{$comment}</td></tr>";
            }
         }
         echo "</table>";
       }
    ?>
  </body>
</html>
