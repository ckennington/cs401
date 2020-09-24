<?php

function renderTable ($fileName, $search = "") {
  $contents = trim(file_get_contents($fileName));
  $data = explode("\n", $contents);
  $lines = array_reverse($data);
  if (count($lines) == 1) {
    echo "No comments yet";
    exit;
  }
  ?>
  <table>
    <thead>
      <th>Name</th><th>Comment</th>
    </thead>
   <?php
    foreach ($lines as $line) {
      list($name, $comment) = explode("|", $line);
      echo "<tr><td>{$name}</td><td>{$comment}</td></tr>";
    }
   ?>
  </table>
<?php
}
?>
