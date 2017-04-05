<?php

class  Cat {

  public $name;

  public function __construct($name) {
    $this->name = $name;
  }

}

$cat = new Cat("fluffy");
echo serialize($cat) . "\n";
