<?php
  require_once 'Dao.php';
  $dao = new Dao();
?>
<html>
  <body>
    <h1>Leave a Comment</h1>
    <form method="post" action="comment_handler.php">
       <div>Name: <input type="text" name="name"/></div>
       <Br/>
       <div>Comment: <input type="text" name="comment"/></div>
       <Br/>
       <div><input type="submit" name="Submit"/></div>
    </form>

    <table>
      <?php
      $comments = $dao->getComments();
      foreach ($comments as $comment) {
        echo "<tr><td>{$comment['name']}</td><td>{$comment['comment']}</td><td>{$comment['date_entered']}</td></tr>";
      }
      ?>
    </table>
  </body>
</html>
