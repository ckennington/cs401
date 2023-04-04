<?php
   session_start();
   if (!isset($_SESSION['auth'])) {
      header("Location: login.php");
      exit();
   } 

?>
<html>
  <head>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/scales.js"></script>
    <link rel="stylesheet" href="scales.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Delicious+Handrawn&display=swap" rel="stylesheet">
  </head>
  <body>
     <img src="https://static.wikia.nocookie.net/rimworld-bestiary/images/f/f3/Dinosauria_velociraptor_f_east.png"/>
     <h1>Dinosaurs!!</h1>
     <div id="nav">
         <ul>
           <li><a href="/dinos/index.php">Home</a></li>
           <li><a href="/dinos/comments.php">Comments</a></li>
           <li><a href="/dinos/favorites.php">Favorites</a></li>
           <li><a href="/dinos/about.php">About</a></li>
           <li><a href="/dinos/careers.php">Careers</a></li>
           <li><a href="/dinos/logout.php">Logout</a></li>
         </ul>
      </div>
