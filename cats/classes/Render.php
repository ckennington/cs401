<?php
class Render {

  public static function renderTable ($rows) {
    $log = new KLogger ("/tmp/log.txt" , KLogger::INFO);
    $log->logInfo($_SERVER['REMOTE_ADDR'] . ":" . __CLASS__. ":" . __FUNCTION__ . " rendering a table");

    $table = "
      <table id='newsletter'>
      <thead>
        <tr>
           <th>Comment</th>
           <th>Date</th>
        </tr>
       </thead>";
    foreach($rows as $row) {
      $table .= "<tr><td>" . htmlentities($row['comment']) . "</td><td>{$row['date_entered']}</td></tr>";
    }
    $table .= "</table>";
    echo $table;
  }
}
