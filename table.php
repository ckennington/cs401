<?php
require_once 'Dao.php';

function renderTable ($fileName, $search = "") {
  $dao = new Dao();
  $comments = $dao->getComments();
  if (count($comments) == 0) {
    echo "No comments yet";
    exit;
  }
  ?>
  <table>
    <thead>
      <th>Name</th><th>Comment</th><th>Delete</th>
    </thead>
   <?php
    foreach ($comments as $comment) {
      echo "<tr><td>{$comment['comment']}</td><td>{$comment['date_entered']}</td><td class='delete'><a href='delete.php?id={$comment['comment_id']}'>X</a></td></tr>";
    }
   ?>
  </table>
<?php
}
?>
