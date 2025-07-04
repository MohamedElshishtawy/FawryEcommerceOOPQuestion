<?php

namespace Models;

use Models\CartItem;
use Exception;
use Models\Product;

class Cart {

    private array $items;


    public function __construct() {
        $this->items  = [];
    }

    protected function is_empity() {

        return empty($this->items);
    
    }

    public function append(Product $product, float $qunatity): void {
        
        if ($qunatity <= 0) {
            throw new Exception("Quantity must be greater than zero.");
        }

        if ($product->getQuantity() < $qunatity) {
            throw new Exception("No enough stock for this product.");
        }

        $this->items[] = new CartItem($product, $qunatity); // check if repeated product
        
    }

    public function removeProduct(Product $product): void {
        
        if ($this->is_empity()) {
            throw new Exception("Cart is empty!");
        }

        foreach ($this->items  as $index => $item) {
            if ($item->getProduct() === $product) {
                unset($this->items[$index]);
                return;
            }
        }

        throw new Exception("Product not found in the cart.");
    }

    public function subTotalPrice()
    {
        $subTotalPrice = 0.0;
        foreach ($this->items as $item) {
            $subTotalPrice += $item->getSubtotal();
        }
        return $subTotalPrice;
    }

    public function shippingFees()
    {
        $shippingFees = 0.0;
        foreach ($this->items as $item) {
            $shippingFees += $item->getShippingFees();
        }
        return $shippingFees;
    }


    public function getItems()
    {
        return $this->items;
    }






}