<?php
?>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <a href="http://cs401/comments/comments.php?name=Conrad">Conrad</a>
    <a href="http://cs401/comments/comments.php?name=bob">bob</a>
     <form action="handler.php" method="POST">
        <input type="checkbox" name="have_bike" value="Bike"> I have a bike<br>
        <input type="checkbox" name="have_car" value="Car" checked="checked"> I have a car<br>
       <div>Name: <input placeholder="name here" type="text" id="name" name="name"></div>
       <div>Comment: <input type="text" id="comment" name="comment"></div>
       <div>Password : <input type="password" id="password" name="password"></div>
       <div>
         <select name="cars">
          <option value="volvo">Volvo</option>
          <option value="saab">Saab</option>
          <option value="mercedes">Mercedes</option>
          <option value="audi">Audi</option>
        </select>
       </div>
       <div>
         <input id="male" type="radio" name="gender" value="male">
         <label for="male">Male</label><br>
          <input type="radio" name="gender" value="female"> Female<br>
          <input type="radio" name="gender" value="other"> Other
       </div>
       <div><input type="submit" value="Add Comment"></div>
     </form>
     <?php
        $comments = trim(file_get_contents("comments.dat"));
        $lines = explode("\n", $comments);
        foreach ($lines as $line) {
          $items = explode("|", $line);
          if (isset($_GET['name']) && ($items[0] == $_GET['name'])) {
            print "$items[0] $items[1]<br/>";
          }
        }
     ?>
  </body>
</html>
