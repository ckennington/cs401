<?php

class User {

  public $userName;
  public $password;
  protected $permission;

  public function __construct($userName, $password) {
    $this->userName = $userName;
    $this->password = $password;
    $this->permission = array();
  }

  public function printUser () {
    echo "Username {$this->userName}  Password {$this->password}\n";
  }

  public function add($a, $b) {
    echo $a + $b;
  }

}
