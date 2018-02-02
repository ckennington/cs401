<?php function render_table ($file_name) {
    $data = file_get_contents($file_name);
    $lines = explode("\n", trim($data)); ?>

      <table>
        <tr>
          <th>Alias</th>
          <th>Snack</th>
        </tr>
        <?php
         foreach ($lines as $line) {
           $items = explode("|", $line);
           echo "<tr><td>" . $items[0] . "</td><td>" . $items[1] . "</td></tr>";
         }
        ?>
      </table>
<?php } ?>
