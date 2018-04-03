<?php
session_start();
require_once '../Dao.php';
$dao = new Dao();
$comments = $dao->getComments();
?>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
    <script src="jquery-3.3.1.js"></script>
    <script src="comments.js"></script>
  </head>
  <body>
     <?php
     if (isset($_SESSION['messages'])) {
       $sentiment = $_SESSION['sentiment'];
       foreach($_SESSION['messages'] as $message) {
         echo "<div class='message $sentiment'>$message <span class='close'>X</span></div>";
       }
     }
     ?>
    <?php
     $presets = array();
     if (isset($_SESSION['presets'])) {
       $presets = array_shift($_SESSION['presets']);
     }
     unset($_SESSION['presets']);
     unset($_SESSION['messages']);
     unset($_SESSION['messages']);
    ?>
     <form id="comment_form" action="handler.php" method="POST" enctype="multipart/form-data">
       <div>Name: <input value="<?php echo isset($presets['name']) ? $presets['name'] : ''; ?>" placeholder="name here" type="text" id="name" name="name"></div>
       <div>Age: <input value="<?php echo isset($presets['age']) ? $presets['age'] : ''; ?>" ptype="text" id="age" name="age"></div>
       <div>Comment: <input value="<?php echo isset($presets['comment']) ? $presets['comment'] : ''; ?>" ptype="text" id="comment" name="comment"></div>
       <div><input type="submit" value="Add Comment"></div>
     </form>
     <table id="comments_table">
     <?php
     echo "";
        foreach ($comments as $comment) {
          print "<tr>" .
                "<td>" . htmlspecialchars($comment['name']) . "</td>" .
                "<td>" . htmlspecialchars($comment['comment']) . "</td>" .
                "<td>" . $comment['date_entered'] . "</td><td><a href='delete_comment.php?id=". $comment['id'] . "'>delete</a></td></tr>";
        }
     ?>
     </table>
  </body>
</html>
