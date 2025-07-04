<?php 

use Models\Product;
use Models\Shippable;

include_once 'Models/Shippable.php';

class PhysicalProduct extends Product implements Shippable {


    private float $weight;

    public function __construct(string $name, float $price, int $quantity, float $weight) {
        parent::__construct($name, $price, $quantity);
        $this->weight = $weight;
    }


    public function getWeight(): float {
        return $this->weight;
    }



}