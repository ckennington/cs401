<?php
require_once 'Dao.php';

class User {

  public $username;
  public $password;

  public function __construct($username = "default", $password = "abc123") {
    $this->username = $username;
    $this->password = $password;
  }

}

$dao = new Dao();
$user = $dao->getUser("monica");
$super_serial = serialize($user);

$rehydrated = unserialize($super_serial);

echo print_r($rehydrated,1);



