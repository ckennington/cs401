<html>
  <head>
  </head>
  <body>
    <?php
       $fruits = array();
       $fruits["purple"] = array("eggplant", "grape");
       $fruits["red"] = array("apple", "cherry", "strawberry", 0.4345, array(), 453453, TRUE);

       foreach ($fruits as $fruit) {
         echo "<pre>" . print_r($fruit, 1) . "</pre>";

       }

    ?>
  </body>
</html>
