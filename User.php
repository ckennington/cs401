<?php
class User {

  public $user;
  public $password;

  public function __construct($user, $password) {
    $this->user = $user;
    $this->password = $password;
  }

}

$user = new User("conrad", "mrbigglesworth01");
echo print_r(unserialize(serialize($user)),1);
echo print_r(json_encode($user),1);
