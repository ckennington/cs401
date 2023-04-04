<?php

class Widgets {

   public static function renderTable ($rows) {
      $columnNames = array_keys($rows[0]); 
      $html = "<table id='comments'><thead><tr>";
      foreach ($columnNames as $name) {
        $html .= "<th>{$name}</th>";
      }
      $html .= "</tr></thead><tbody>";
      foreach ($rows as $row) {
        $html .= "<tr>";
        foreach($row as $columnName => $item) {
          if ($columnName == "image_path") { 
            $html .= "<td><img src='{$item}'/></td>";
          } else {
          $html .= "<td>". htmlspecialchars($item) . "</td>";
          }
        }
        $html .= "<td><a href='delete_handler.php?id={$row['id']}'>X</a></td>" ;
        $html .= "</tr>" ;
      }
      $html .= "</table>";
      return $html;
   }
}
