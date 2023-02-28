<?php
class Student {

  public $name; 
  public $age; 
  public $favoriteDino; 

  private $password = "lollipop1";

  public function __construct($name, $age, $favoriteDino = "not cool. doesn't like dinosaurs") {
    $this->name = $name;
    $this->age = $age;
    $this->favoriteDino = $favoriteDino;
  }

  public function authenticate ($password) {
    return ($this->password == $password);
  }

  public function setPassword ($password) {
    $this->password = $password;
  }

}
