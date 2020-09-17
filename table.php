<?php

function renderTable ($fileName) {
  $contents = trim(file_get_contents($fileName));
  $lines = explode("\n", $contents);
  ?>
  <table>
    <thead>
      <th>Name</th><th>Contribution</th>
    </thead>
   <?php
    foreach ($lines as $line) {
      list($name, $contribution) = explode("|", $line);
      echo "<tr><td>{$name}</td><td>{$contribution}</td></tr>";
    }
   ?>
  </table>
<?php
}
?>
