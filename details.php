<?php
require_once 'Dao.php';
$dao = new Dao();
$products = $dao->getProducts();?>

<h1>Product Details</h1>

<ul>
<?php
foreach ($products as $product) {
  if ($product->name == $_GET['name']) {
    echo "<div>Name: {$product->name}</div>";
    echo "<div>Description: {$product->description}</div>";
    echo "<div>Quantity: {$product->quantity}</div>";
    echo "<div>Price: {$product->price}</div>";
    break;
  }
}
?>
</ul>
