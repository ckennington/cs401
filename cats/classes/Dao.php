<?php
class Dao {

  private $file;

  public static function hello () {
    return "there";
  }

  public function __construct ($file = 'cats.data') {
    $this->file = $file;
  }

  public function getComments () {
    $data = explode("\n", file_get_contents($this->file));
    if(empty($data[count($data)-1])) {
      unset($data[count($data)-1]);
    }
    $data = array_reverse($data);
    return $data;
  }

}
