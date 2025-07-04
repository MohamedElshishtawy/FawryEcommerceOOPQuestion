<?php 

namespace Models;

class ShippingItem implements Shippable {

    private CartItem $cartItem;

    public function __construct(CartItem $item) {
        if (!$item->getProduct() instanceof Shippable) {
            throw new \Exception("Product is not shippable.");
        }
        $this->cartItem = $item;
    }

    public function getWeight(): float
    {
        return $this->cartItem->getProduct()->getWeight() * $this->cartItem->getQuantity();
    }

    public function getName(): string
    {
        return $this->cartItem->getProduct()->getName();   
    }

}