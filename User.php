<?php

class User {

  private $name;
  private $email;

  public function __construct($name = "Default", $email = "no email") {
    $this->name = $name;
    $this->email = $email;
  }

  public function printUser() {
    echo "Name: {$this->name}  Email: {$this->email}\n";
  }

}
