<?php
class Render {

  public static function renderTable ($rows) {
    $table = "
      <table id='newsletter'>
      <thead>
        <tr>
           <th>Comment</th>
           <th>Date</th>
        </tr>
       </thead>";
    foreach($rows as $row) {
      $table .= "<tr><td>{$row['comment']}</td><td>{$row['date_entered']}</td></tr>";
    }
    $table .= "</table>";
    echo $table;
  }
}
