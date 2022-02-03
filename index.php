<?php
   echo "Hello World!</br>";
   $a = "5";
   echo gettype($a) . "</br>";

   $b = "6";
   $c = 6;

   if ($b === $c) {
     echo "YES equal<br/>";
   } else {
     echo "NOT equal<br/>";
   }

   for ($i = 1; $i <= 6; $i++) {
     //echo "<h{$i}>Hello!</h{$i}>";
   }

   $purple = array("grapes", "eggplants");
   $fruits = array("apple", 1, "banana", "purple" => $purple);

   echo "<pre>" . print_r($fruits,1) . "</pre>";

   foreach ($fruits as $fruit) {
     echo $fruit . "<br/>";
   }
  
   

