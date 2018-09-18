<?php
require_once "Product.php";

$p1 = new Product("TV", "75'' Panasonic", 5, 1999.99);
$p2 = new Product("Blue-ray Player", "A really nice one", 3, 123.43);
$p3 = new Product("Leather Sofa", "65'' super soft and fluffy and brown", 1, 54323.32);
$p4 = new Product("Legally Blonde Platinum Collection", "2 disc set", 392, 10.00);


file_put_contents("products.txt", serialize($p1) . "\n", FILE_APPEND | LOCK_EX);
file_put_contents("products.txt", serialize($p2) . "\n", FILE_APPEND | LOCK_EX);
file_put_contents("products.txt", serialize($p3) . "\n", FILE_APPEND | LOCK_EX);
file_put_contents("products.txt", serialize($p4) . "\n", FILE_APPEND | LOCK_EX);
