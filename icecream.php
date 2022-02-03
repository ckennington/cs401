<?php 
$current = 'icecream';
require_once 'header.php';

$data = file_get_contents("icecream.dat");
$lines = explode("\n", trim($data));
?>
      <table>
        <thead>
          <th>Name</th>
          <th>Icecream</th>
        </thead>
<?php
    foreach ($lines as $line) {
       $row = explode("|", $line);
       echo "<tr><td>{$row[0]}</td><td>{$row[1]}</td></tr>";
    }

?>
      </table>
    </div>
<?php require_once 'footer.php'; ?>    
