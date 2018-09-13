<html>
  <?php require_once "header.php"; ?>
  <?php require_once "nav.php"; ?>
    <div id="content">
      <?php require_once "table.php";
        render_table("favorites.txt", array("name", "icecream"));
      ?>
    </div>
  </body>
</html>
