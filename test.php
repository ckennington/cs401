<?php
  echo "<h1>Hello, this is PHP</h1>";

  for ($i = 1; $i <= 6; $i++) {
    echo "<h{$i}>I am a header tag</h{$i}>";
  }

  $a = 5;
  $b = "5";
  if ($a === $b) {
    echo "they are the SAME!<br/>";
  } else {
    echo "they are NOT the SAME!<br/>";
  }

  $fruit = array("red" => array("apple", "cherry"), "yellow" => array("banana"));
  $fruit[] = 4.12323;
  $fruit[] = 323;

  echo "<pre>" . print_r($fruit, true) . "</pre>";

  echo "<pre>" . print_r($fruit["red"], true) . "</pre>";

?>
