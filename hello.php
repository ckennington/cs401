<?php
   echo "Hello world!\n";


  $a = 5;
  $b = "5";

  if ($a === $b) {
    echo "they are equal!\n";
  }

  for ($i = 1; $i <= 6; $i++) {
    echo "<h{$i}>Hello World!</h{$i}>";
  }


  $reds = array("apple", "pomegrante", "cherry", "tomato");
  $greens = array("apple", "grape", "pear", "unripe banana", 5423.4);

  $fruits = array("reds" => $reds, "greens" => $greens);

  echo "<pre>" . print_r($fruits['reds'],1) . "</pre>";

/*
  foreach ($fruits as $fruit) {
    echo "{$fruit}\n";
  }

  for ($i = 0; $i < count($fruits); $i++) {
    echo "{$fruits[$i]}\n";
  }
*/
