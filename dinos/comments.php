<?php 
include("nav.php"); 
require_once "Widgets.php";
require_once 'Dao.php';

?>
<div id="content">
   <?php
   if(isset($_SESSION['message'])) {
      echo "<div id='message'>" . $_SESSION['message'] . "</div>";
      unset($_SESSION['message']);
   }

   ?>
   Leave a Comment
   <form id="comment_form" method="POST" action="comment_handler.php" enctype="multipart/form-data">
     <br/>
     <div>Upload an image: <input type="file" id="myfile" name="myfile" /></div>
     <br/>
     <input type="text" id="comment" value="<?php echo isset($_SESSION['inputs']['comment']) ? $_SESSION['inputs']['comment'] : '' ?>" name="comment">
     <input type="submit" value="Submit">
   </form>

   <?php
    $dao = new Dao();
    $comments = $dao->getComments();
    echo Widgets::renderTable($comments);

    ?>
</div>
<?php include("footer.php"); ?>
