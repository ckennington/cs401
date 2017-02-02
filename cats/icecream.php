<?php
  include("header.php");
  $data = explode("\n", file_get_contents('icecream.data'));
?>
<div id="content">
  <?php include("table.php"); ?>
</div>
<?php
  include("footer.php");
?>
