<?php
class Dao {

   public $file;

   public function __construct($file) {
      $this->file = $file;
   }

   public function getIcecreamData() {
      $rows = explode("\n", trim(file_get_contents($this->file)));
      return $rows;
   }
}
