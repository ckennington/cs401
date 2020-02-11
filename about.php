<?php
require_once 'header.php';

require_once "User.php";
$user1 = new User("Conrad Kennington", "conradkennington@gmail.com");
$user1->printUser();
echo "<br/>";
$user2 = new User();
$user2->printUser();

require_once 'footer.php';
