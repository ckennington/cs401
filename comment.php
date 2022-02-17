<?php

  require_once 'Dao.php';
  $dao = new Dao();
?>

<html>
   <head>
     <link rel="stylesheet" href="icecream.css">
   </head>
<html>
  <head>
    <title>Comments</title>
    <link rel="stylesheet" type="text/css" href="comment.css">
  </head>
  <body>
    <h1>Comments</h1>
    <form name="commentForm" action="handler.php" method="POST">
      <div>
        Leave a comment: <input type="text" name="comment">
      </div>
      <div>
        <input type="submit" value="Submit">
      </div>
    </form>
    <?php
    $comments = $dao->getComments();
    echo "<table>";
    foreach ($comments as $comment) {
      echo "<tr>";
      echo "<td>" . $comment["comment"] . "</td>";
      echo "<td>" . $comment["date_entered"] . "</td>";
      echo "<td class='delete'><a href='delete_handler.php?id={$comment['comment_id']}'>X</a></td>";
      echo "</tr>";
    }
    echo "</table>";
    ?>
  </body>
</html>
