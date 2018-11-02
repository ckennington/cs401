<?php
session_start();

//echo "<pre>" . print_r($_SESSION,1) . "</pre>";

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
  header('Location: http://cs401/comments/login.php');
  exit;
}

require_once 'Comments_Dao.php';
$dao = new Comments_Dao();
$comments = $dao->getComments();
?>


<html>
  <head>
    <link href="comments.css" type="text/css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/comment.js"></script>
  </head>
  <body>
    <h1>Comments</h1><a href="logout.php">Logout</a>
    <h2 id="subtitle">Leave a Comment</h2>

    <button id="hello" type="button">Hello There!</button>
<?php if (isset($_SESSION['messages'])) {
  foreach ($_SESSION['messages'] as $message) {?>
      <div class="message <?php echo isset($_SESSION['validated']) ? $_SESSION['validated'] : '';?>"><?php
      echo $message; ?></div>
<?php  }
 unset($_SESSION['messages']);
?> </div>
<?php } ?>

    <form method="post" action="handler.php" enctype="multipart/form-data">
			Name:<br>
      <input type="text" name="name" value="<?php echo isset($_SESSION['presets']['name']) ? $_SESSION['presets']['name'] : ''; ?>"><br>
			Comment:<br>
			<input type="text" name="comment" value="<?php echo isset($_SESSION['presets']['comment']) ? $_SESSION['presets']['comment'] : ''; ?>">
      <input type="file" name="pic" accept="image/*"><br/>
      <input type="submit" value="Submit">
    </form>

    <table>
<?php

    foreach ($comments as $comment) {
      echo "<tr><td><img src='" . $comment['image_path'] . "'/></td><td>" . htmlentities($comment['name']) . "</td><td>{$comment['comment']}</td><td>{$comment['date_entered']}</td><td><a href='http://cs401/comments/delete.php?id={$comment['id']}'/>X</a></td></tr>";
    }
?>
    </table>

  </body>
</html>
