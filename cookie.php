<html>
<head>
</head>
  <body>
  <h1>setting a cookie</h1>
  <?php
   session_start();
   if (isset($_COOKIE['hello'])) {
     $count = $_COOKIE['hello'] + 1;
   } else {
     $count = 1;
   }
   setcookie("hello", $count);
   echo "You've visited this site {$count} times";
  ?>
  </body>
<html>

