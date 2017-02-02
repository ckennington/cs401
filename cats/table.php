 <table id="newsletter">
  <thead>
    <tr>
       <th>Date</th>
       <th>Title</th>
    </tr>
   </thead>
  <?php
    foreach($data as $line) {
      $row = explode("|", $line);
      echo "<tr><td>{$row[0]}</td><td>{$row[1]}</td></tr>";
    }

  ?>
 </table>
