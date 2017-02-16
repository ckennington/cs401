<?php
  include("header.php");
  require_once 'classes/Dao.php';
  require_once 'classes/Render.php';
  $dao = new Dao();

?>
<div id="content">
  <form method="POST" action="handler.php">
    <div>
    Enter a comment
    <input type="text" id="comment" name="comment">
    <input type="submit">
  </form>
  <?php Render::renderTable($dao->getComments()); ?>
</div>
<?php
  include("footer.php");
?>
