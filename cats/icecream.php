<?php
  include("header.php");
  require_once 'classes/Dao.php';
  require_once 'classes/Render.php';
  $dao = new Dao('icecream.data');
?>
<div id="content">
  <?php Render::renderTable($dao->getComments()); ?>
</div>
<?php
  include("footer.php");
?>
