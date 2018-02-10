<?php

require_once "User.php";

class Dao {

  public function getUser ($lookup) {
    $date = new DateTime();
    echo print_r($date,1);
    $data = file_get_contents("users.dat");
    $users = explode("\n", trim($data));
    foreach ($users as $user) {
      $user = explode("|", trim($user));
      if ($lookup == $user[0]) {
        return new User($user[0], $user[1]);
      }
    }
    throw new Exception("user not found");
  }

}
