<?php
  $a = "5";
  $b = 5;

  $fruit = array();
  $fruit["red"] = array("cherries", "apples");
  $fruit["green"] = array("beans");


  echo "<pre>" . print_r($fruit["red"],1) . "</pre>";


  if ($a === $b) {
    echo "They are the same! <br/>";
  } else {
    echo "They are NOT the same! <br/>";
  }

  for ($i = 1; $i <= 6; $i++) {
    print "<h{$i}>you need some text</h{$i}>";
  }

