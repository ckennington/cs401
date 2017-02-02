<html>
  <head>
  </head>
  <body>
    <?php
      $fruit = array();
      $fruit['purple'] = array(TRUE, 'eggplants', array("3343423"));
      $fruit['red'] = array(1.32112, 'apples', 'cherries');
    ?>
    <pre>
    <?php
      echo print_r(count($fruit),1);
    ?>
    </pre>

  </body>
</html>
