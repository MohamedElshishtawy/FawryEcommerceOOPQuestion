<?php

namespace Models;

use Models\Product;
use Services\FeesCalcsService;

class CartItem {

    private Product $product;
    private float $quantity;

    public function __construct(Product $product, float $quantity) {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getProduct(): Product {
        return $this->product;
    }

    public function getQuantity(): float {
        return $this->quantity;
    }

    public function getSubtotal(): float {
        return $this->product->getPrice() * $this->quantity;
    }

    public function getShippingFees()
    {
        if ($this->product instanceof Shippable) {
            return $this->quantity * FeesCalcsService::calcShippingFees($this->product->getWeight()) ;
        }
        return 0.0;
    }

}