<html>
  <head>
  </head>
  <body>
    <?php
      for ($i = 1; $i <= 6; $i++) {
         echo  "<h{$i}>Hello</h{$i}>";
      }

      $a = "5";
      $b = 5;
      echo $a . $b;

      if ($a === $b) {
         echo "they are the SAME</br>";
      } else {
         echo "they are NOT the SAME<br/>";
      }

      $fruit = array();

      $fruit["red"] = array("apple", "strawberry");
      $fruit[5] = "bananas";
      $fruit["4.5"] = "rambutan";

      echo "<pre>" . print_r($fruit, true) . "</pre>";




    ?>
  </body>
</html>
