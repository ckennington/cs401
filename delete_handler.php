<?php
   require_once 'Dao.php';
   $dao = new Dao();
   $dao->deleteComment($_GET['comment_id']);
   header("Location: http://cs401/comments.php");
?>
