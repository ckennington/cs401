<?php 
include("nav.php"); 
require_once "Widgets.php";
require_once 'Dao.php';
?>
<div id="content">
   Leave a Comment
   <form id="comment_form" method="POST" action="comment_handler.php">
     <input type="text" id="comment" name="comment">
     <input type="submit" value="Submit">
   </form>

   
   <?php
    $dao = new Dao();
    $comments = $dao->getComments();
    echo Widgets::renderTable($comments);

    ?>
</div>
<?php include("footer.php"); ?>
