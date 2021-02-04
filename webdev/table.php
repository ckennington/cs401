<?php
  function renderTableContents() {
    $contents = file_get_contents("students.dat");
    $lines = explode("\n", trim($contents));
    $header = array_shift($lines);
    foreach ($lines as $line) {
       list($name, $major, $year, $icecream) = explode("|", trim($line));
       echo "<tr><td>{$name}</td><td>{$major}</td><td>{$year}</td><td>{$icecream}</td></tr>";
    }
  }
?>
