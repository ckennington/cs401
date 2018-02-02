<html>
  <head>
    <link rel="stylesheet" href="template.css">
  </head>
  <body>
    <h1>Page of Favorites</h1>
    <ul>
      <li <?php if ($thisPage=="snacks") { echo " id=\"currentpage\""; } ?>>
          <a href="snacks.php">Favorite Snacks</a>
      </li>
      <li <?php if ($thisPage=="icecream") { echo " id=\"currentpage\""; } ?>>
          <a href="icecream.php">Favorite Icecream</a>
      </li>
    </ul>
