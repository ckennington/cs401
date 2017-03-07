<?php
  if (isset($_COOKIE['visited'])) {
    $visited = $_COOKIE['visited'];
    $visited++;
    setcookie("visited", $visited);

  } else {
    setcookie("visited", 1);
  }
  include("header.php");
  require_once 'classes/Dao.php';
  require_once 'classes/Render.php';
  $dao = new Dao();
?>
<div id="content">
  <?php echo "you have visited this site " . $_COOKIE['visited'] . " times."; ?>
  <form method="POST" action="handler.php">
    <div>
    Enter a comment
    <input type="text" id="comment" name="comment">
    Enter your age
    <input type="text" id="age" name="age">
    <input type="submit">
  </form>
  <?php
  if (isset($_SESSION['message'])) {?>
  <div id="message" class="<?php echo $_SESSION['mtype']; ?>">
    <?php
      echo $_SESSION['message'];
      unset($_SESSION['message']);
    ?>
  </div>

  <?php } ?>

  <?php Render::renderTable($dao->getComments()); ?>
</div>
<?php
  include("footer.php");
?>
