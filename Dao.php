<?php
require_once 'Product.php';

class Dao {

  public function getProducts() {
    $products = trim(file_get_contents("products.txt"));
    $lines = explode("\n", $products);
    $objects = array();
    foreach ($lines as $line) {
      $objects[] = unserialize($line);
    }
    return $objects;
  }

}
