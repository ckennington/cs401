<html>
  <head>
    <link rel="stylesheet" type="text/css" href="icecream.css">
  </head>
  <body>
    <h1>Icecream Website</h1>
    <div id="navigation">
      <ol>
        <li><a <?php if ($pageName == "icecream") { echo "class='active';"; } ?> href="icecream.php">Home</a></li>
        <li><a <?php if ($pageName == "favorites") { echo "class='active';"; } ?> href="favorites.php">Favorites</a></li>
        <li><a <?php if ($pageName == "history") { echo "class='active';"; } ?> href="history.php">History</a></li>
        <li><a <?php if ($pageName == "about") { echo "class='active';"; } ?> href="about.php">About</a></li>
      </ol>
    </div>
    <div id="content">
