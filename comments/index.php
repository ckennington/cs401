<?php
session_start();

require_once 'Comments_Dao.php';
$dao = new Comments_Dao();
$comments = $dao->getComments();
?>


<html>
  <head>
    <link href="comments.css" type="text/css" rel="stylesheet" />
  </head>
  <body>
    <h1>Comments</h1>
    <h2>Leave a Comment</h2>
<?php if (isset($_SESSION['messages'])) {
  foreach ($_SESSION['messages'] as $message) {?>
    <div class="message"><?php
      echo $message; ?></div>
<?php  }
 unset($_SESSION['messages']);
?> </div>
<?php } ?>
    <form method="post" action="handler.php">
			Name:<br>
			<input type="text" name="name" value=""><br>
			Comment:<br>
			<input type="text" name="comment">
      <input type="submit" value="Submit">
    </form>

    <table>
<?php

    foreach ($comments as $comment) {
      echo "<tr><td>" . htmlentities($comment['name']) . "</td><td>{$comment['comment']}</td><td>{$comment['date_entered']}</td><td><a href='http://cs401/comments/delete.php?id={$comment['id']}'/>X</a></td></tr>";
    }
?>
    </table>

  </body>
</html>
