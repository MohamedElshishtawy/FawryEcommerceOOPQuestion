<?php
namespace Services;

use Models\Shippable;
use Models\ShippingItem;

class ShippingService {
    private array $shippingItems;

    public function __construct($items = []) {
        $this->shippingItems = [];

        if ($items) {
            foreach ($items as $item) { 
                $this->addShippingItem($item);
            }
        }
    }

    public function addShippingItem(ShippingItem $item): void {
        $this->shippingItems[] = $item;
    }

    public function getShippingItems(): array {
        return $this->shippingItems;
    }


    public function showItems()
    {
        if (empty($this->shippingItems)) {
            echo "No shipping items available.\n";
            return;
        }
        echo "Shipping Items:<br>";
        foreach ($this->shippingItems as $item) {
            echo 'Name: ' . $item->getName() . ", Weight: " . $item->getWeight() . "kg <br>";
        }
    }




    

}