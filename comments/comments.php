<?php

require_once '../Dao.php';
$dao = new Dao();
$comments = $dao->getComments();
?>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
     <form action="handler.php" method="POST">
       <div>Name: <input placeholder="name here" type="text" id="name" name="name"></div>
       <div>Comment: <input type="text" id="comment" name="comment"></div>
       <div><input type="submit" value="Add Comment"></div>
     </form>
     <table>
     <?php
echo "<tr><th>Name</th><th>Comment</th><th>Date</th><th></th></tr>";
        foreach ($comments as $comment) {
          print "<tr><td>" . $comment['name'] . "</td>" .
                "<td>" . $comment['comment'] . "</td>" .
                "<td>" . $comment['date_entered'] . "</td><td><a href='delete_comment.php?id=". $comment['id'] . "'>delete</a></td></tr>";
        }
     ?>
     </table>
  </body>
</html>
