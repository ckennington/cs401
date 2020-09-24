<?php

  require_once 'Dao.php';
  require_once 'User.php';

  $user = new User("sarahkennington@gmail.com", "abc123");
  $dao = new Dao();
  $dao->saveUser($user);
