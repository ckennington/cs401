<?php

class Hello {
  public $hello = "there";
}

$a = new Hello();
$b = json_encode($a);
var_dump(json_decode($b));
