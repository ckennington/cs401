<?php
   file_put_contents("comments.data", $_POST['comment'] . "\n", FILE_APPEND | LOCK_EX);
   header("Location: http://cs401/comments.php");
?>
