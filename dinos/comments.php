<?php 
include("nav.php"); 
require_once "Widgets.php";
?>
<div id="content">
   Leave a Comment
   <form id="comment_form" method="POST" action="comment_handler.php">
     <input type="text" id="comment" name="comment">
     <input type="submit" value="Submit">
   </form>

   <?php echo Widgets::renderTable(array("Comment"), "comments.log", true); ?>
</div>
<?php include("footer.php"); ?>
