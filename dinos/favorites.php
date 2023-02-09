<?php include("nav.php"); 
      require_once "Widgets.php";
?>


      <div id="content">
         <?php echo Widgets::renderTable(array("Student", "Age", "Dinosaur"), "favorites.data"); ?>
      </div>
<?php include("footer.php"); ?>
