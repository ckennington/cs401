<?php

class Calculator {
    public static function add ($a, $b) {
        return $a + $b;
    }
}

echo Calculator::add(5, 10) . "\n";

abstract class Animal {
  public function speak() {
    echo "default animal\n";
  }
}

class Dog extends Animal {

    public function speak() {
      echo "bark\n";
    }
}

$dog = new Dog();
$dog->speak();
