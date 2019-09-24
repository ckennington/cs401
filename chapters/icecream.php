<?php
   require_once 'Render.php';
   require_once 'Dao.php';
   $dao = new Dao('icecream.data');
?>
<html>
  <head>
    <title>harry potter</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
  </head>
  <body>
    <hr/>
    <h1>Icecream</h1>
    <?php
       require_once 'navbar.php';
    ?>
    <h2>Favorite Icecream</h2>
    <div>
    <?php
       $render = new Render();
       $render->renderTable($dao->getIcecreamData());
    ?>
    </div>

  </body>
</html>
