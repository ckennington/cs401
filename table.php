<?php
function render_table($filename) {
     $data = file_get_contents($filename);
     $lines = explode("\n", trim($data));
     $header = array_shift($lines);
     $headerItems = explode("|", $header);
?>
      <table>
        <thead>
          <tr>
            <?php foreach ($headerItems as $headerItem) {
              echo "<th>{$headerItem}</th>";
            }?>
          </tr>
        </thead>
       <?php
          foreach ($lines as $line) {
            $items = explode("|", $line);
            echo "<tr>";
            echo "<td>{$items[0]}</td>";
            echo "<td>{$items[1]}</td>";
            echo "</tr>";
          }
       ?>
      </table>
<?php } ?>

