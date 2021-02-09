<?php

class User {

  public $id;
  public $username;
  private $password;
  private $permissions;
  public $age;

  public function __construct($id, $username = "default") {
      $this->username = $username;
  }

  public function checkPassword ($password) {
    $users = $this->getUsers();
    return ($users[$this->username] === $password);
  }

  private function getUsers () {
    $contents = file_get_contents("users.dat");
    $lines = explode("\n", trim($contents));
    $users = array();
    foreach ($lines as $line) {
       list($username, $password) = explode("|", trim($line));
       $users[$username] = $password;
    }
    return $users;
  }
}

User::printHello();

$a = new User(1, "conrad", );
echo $a->username . "\n";
if ($a->checkPassword("abc123")) {
  echo "logged in\n";
} else {
  echo "nope\n";
}
?>
