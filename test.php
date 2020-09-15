<html>
  <head></head>
  <body>
  <?php


     print "<pre>" . print_r($_GET, true) . "</pre>";

     // add two variables!!
     function add ($a, $b) {
       return $a + $b;
     }

     echo "ADDING " . add(10, 20) . "\n";


     $a = array("conrad", "kennington", 05.345, 23, 'y', "green" => "apple");
     $a[] = "append me!";

     print "<pre>" . print_r($a, true) . "</pre>";

     foreach ($a as $item) {
       echo $item . "<br/>";
     }

     sort($a);
     print "<pre>" . print_r($a, true) . "</pre>";

  ?>


  </body>
</html>
