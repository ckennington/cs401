<?php


  session_start();
  $messages = array();
  if (isset($_SESSION['message'])) {
    $messages = $_SESSION['message'];
    unset($_SESSION['message']);
  } 
  
  require_once 'Dao.php';
  $dao = new Dao();

  function getUserInput ($lookup) {
     return (isset($_SESSION['post'][$lookup])) ? $_SESSION['post'][$lookup] : "";
  }

?>

<html>
   <head>
     <link rel="stylesheet" href="comment.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="js/comment.js"></script>
   </head>
<html>
  <head>
    <title>Comments</title>
    <link rel="stylesheet" type="text/css" href="comment.css">
  </head>
  <body>
    <h1>Comments</h1>
    <form id="commentForm" name="commentForm" method="POST">
      <div>
        enter your age: <input type="text" name="age" value="<?php echo getUserInput('age'); ?>">
      </div>
      <div>
        Leave a comment: <input type="text" id="comment" name="comment" value="<?php echo getUserInput('comment'); ?>">
      </div>
<!--
      <div>
        Upload an image: <input type="file" id="myfile" name="myfile" />
      </div>
-->
      <div>
        <input type="submit" value="Submit">
      </div>
    </form>
    <?php
    foreach ($messages as $message) {
      echo "<div class='message " . $_SESSION['sentiment']. "'>{$message}<span class='close'>x</span></div>";
    }

    $comments = $dao->getComments();
    echo "<table id='comments'>";
    foreach ($comments as $comment) {
      echo "<tr>";
      echo "<td>" . htmlspecialchars($comment["comment"]) . "</td>";
      echo "<td>" . (!empty($comment["image"])) ? "<img src='" . $comment['image'] . "'/>" : "&nbsp;"  . "</td>";
      echo "<td>" . $comment["date_entered"] . "</td>";
      echo "<td class='delete'><a href='delete_handler.php?id={$comment['comment_id']}'>X</a></td>";
      echo "</tr>";
    }
    echo "</table>";
    ?>
  </body>
</html>
