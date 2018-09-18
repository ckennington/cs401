<?php

class Product {

  public $name;
  public $description;
  public $price;
  public $quantity;

  public function __construct($name, $description, $quantity, $price = 0.0) {
    $this->name = $name;
    $this->description = $description;
    $this->price = $price;
    $this->quantity = $quantity;
  }
}
