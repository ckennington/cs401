<?php 
require_once "header.php"; 
require_once "Dao.php";

$dao = new Dao();

setcookie("usertoken", "noice");


if(isset($_COOKIE["visits"])) {
   $cookie = $_COOKIE["visits"]; 
   echo "number of visits: {$cookie}";
   setcookie("visits", $cookie + 1);
} else {
   setcookie("visits", 1);
}

?>

 <div id="text">
    <h2>Not stolen stuff for sale</h2>

    <table>
       <thead>
          <tr>
          <th>Item</th>
          <th>Seller</th>
          <th>Cost</th>
       </tr>
       </thead>
    <?php

       $lines = $dao->getGoods();
       foreach ($lines as $line) {
           list($item, $name, $amount) = explode("|", $line);
           echo "<tr><td>{$item}</td><td>{$name}</td><td>{$amount}</td></tr>";
       }
    ?>     
    </table>

 </div>
<?php require_once "footer.php"; ?>
