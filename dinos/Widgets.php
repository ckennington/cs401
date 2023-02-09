<?php

class Widgets {


   public static function renderTable ($columns, $filename, $reverse = false) {
      $contents = trim(file_get_contents($filename));
      $lines = explode("\n", $contents);
      if ($reverse) {
         $lines = array_reverse($lines);
      }
      $html = "<table><thead><tr>";
      foreach ($columns as $column) {
        $html .= "<th>{$column}</th>";
      }
      $html .= "</tr></thead><tbody>";
      foreach ($lines as $line) {
        $items = explode("|", $line);
        $html .= "<tr>";
        foreach($items as $item) {
          $html .= "<td>{$item}</td>";
        }
        $html .= "</tr>" ;
      }
      $html .= "</table>";
      return $html;
   }
}
