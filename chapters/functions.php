<?php
function renderTable ($file) {
    $rows = explode("\n", trim(file_get_contents($file))); ?>
    <table id="icecream">
    <?php
       foreach($rows as $row) {
         list($name, $age, $flavor) =  explode("|", $row);
         echo "<tr><td>{$name}</td><td>{$age}</td><td>{$flavor}</td></tr>";
       }
    ?>
    </table>
<?php } ?>
