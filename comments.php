<html>
  <head>
    <link rel="stylesheet" type="text/css" href="comments.css">
  </head>
  <body>
    <h1>Leave a comment</h1>
    <form action="comment_handler.php" method="post">
      <div>Leave a comment</div>
      <input type="text" name="comment">
      <input type="submit">
    </form>
    <?php
       require_once 'Dao.php';
       $dao = new Dao();
       $comments = $dao->getComments();
       echo "<table>";
       foreach($comments as $comment) {
         echo "<tr><td>{$comment['comment']}</td>" .
           "<td>{$comment['date_entered']}" .
           "<td><a href='delete_handler.php?comment_id={$comment['comment_id']}'>X</a></td></tr></tr>";
       }
         echo "</table>";
    ?>
  </body>
</html>
