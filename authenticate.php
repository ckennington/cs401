<?php

require_once 'Student.php';

// instantiate a student
$student1 = new Student("conrad", 13);

$student1->setPassword("lollipop2");

if ($student1->authenticate("lollipop1")) {
  echo "authenticated\n";
} else {

  echo "access denied\n";
}

