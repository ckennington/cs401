<?php
require_once 'Dao.php';
$dao = new Dao();
$products = $dao->getProducts();?>

<h1>Products</h1>

<ul>
<?php
foreach ($products as $product) {
  echo "<li><a href='details.php?name={$product->name}'>{$product->name}</li>";
}
?>
</ul>
