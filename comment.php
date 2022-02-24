<?php


  session_start();
  echo "<pre>" .  print_r($_SESSION,1) . "</pre>";
  if (isset($_SESSION['message'])) {
    unset($_SESSION['message']);
  }
  
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
        enter your age: <input type="text" name="age">
      </div>
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
      echo "<td>" . htmlspecialchars($comment["comment"]) . "</td>";
      echo "<td>" . $comment["date_entered"] . "</td>";
      echo "<td class='delete'><a href='delete_handler.php?id={$comment['comment_id']}'>X</a></td>";
      echo "</tr>";
    }
    echo "</table>";
    ?>
  </body>
</html>
