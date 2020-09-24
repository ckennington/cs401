<?php
class Dao {

  protected $file;

  public function __construct () {
    $this->file = 'users.txt';

  }

  public function saveUser ($user) {
    file_put_contents($this->file, "{$user->userName}|{$user->password}\n", FILE_APPEND | LOCK_EX);
  }

}
