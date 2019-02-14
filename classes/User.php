<?php
abstract class User {

  public $username;
  public $password;

  public function __construct ($username, $password = "abc123") {
    $this->username = $username;
    $this->password = $password;
  }

  public function isPasswordValid ($password) {
    return $password == $this->password;
  }

}
