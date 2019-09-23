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
       require_once 'functions.php';
       renderTable("icecream.data");
    ?>
    </div>

  </body>
</html>
