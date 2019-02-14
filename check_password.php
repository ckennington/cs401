<?php
require_once "classes/User.php";

$user1 = new User("conrad", "mrbigglesworth");
$user2 = new User("sarah");

if ($user2->isPasswordValid("abc123")) {
  echo "access granted";
}
