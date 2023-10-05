<?php
  session_start();

  require_once 'Dao.php';
  $dao = new Dao();
?>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="icecream.css">
  </head>
  <body>
    <h1>Leave a Comment</h1>
    <form method="post" action="comment_handler.php">
       <div>Name: <input type="text" name="name"/></div>
       <Br/>
       <div>Comment: <input type="text" name="comment"/></div>
       <Br/>
       <div><input type="submit" name="Submit"/></div>
    </form>

    <?php
    if (isset($_SESSION['messages'])) {
       if (isset($_SESSION['messages']['bad'])) {
          foreach ($_SESSION['messages']['bad'] as $bad) {
            echo "<div class='message bad'>{$bad}</div>";
          }
       }
       if (isset($_SESSION['messages']['good'])) {
          foreach ($_SESSION['messages']['good'] as $good) {
            echo "<div class='message good'>{$good}</div>";
          }
       }
    }

    ?>

    <table>
      <?php
      $comments = $dao->getComments();
      foreach ($comments as $comment) {
        echo "<tr><td>{$comment['name']}</td><td>" . htmlentities($comment['comment']) . "</td><td>{$comment['date_entered']}</td></tr>";
      }
      ?>
    </table>
  </body>
</html>
