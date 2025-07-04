<?php

use Models\Cart;
use Models\Customer;
use Models\Shippable;
use Services\ShippingService;

class CheckoutService {


    public static function checkout(Customer $customer, Cart $cart): void
    {

        self::printShipmentNotice($cart);
        
        self::printCheckoutReceipt($cart);
        
        // Process payment
        $amount = $cart->subTotalPrice() + $cart->shippingFees();
        $customer->pay($amount); // will check the customer balance also

        // Send shippable products to ShippingService
        $shippingService = self::sendShippingItemsToService($cart);
        $shippingService->showItems();
    }

    private static function sendShippingItemsToService(Cart $cart): ShippingService
    {
        $items = [];

        foreach ($cart->getItems() as $item) {
            if ($item->getProduct() instanceof Shippable) {
                $items[] = new \Models\ShippingItem($item);
            }
        }

        return new ShippingService($items);

    }

    private static function printShipmentNotice(Cart $cart): void
    {
        $items = $cart->getItems();
        $totalWeight = 0.0;

        echo "** Shipment notice **<br>";
        
        foreach ($items as $item) {
            $product = $item->getProduct();
            
            if ($product instanceof Shippable) {
                $quantity = $item->getQuantity();
                $name = $product->getName();
                $weight = $product->getWeight();
                
                $totalWeight += $weight * $quantity;
                echo $quantity . 'x ' . $name . ' | ' . $weight . 'gram<br>';
            }
        }
        
        echo 'Total package weight ' . ($totalWeight/1000) . 'kg<br>';
        echo "----------------------<br>";
    }

    private static function printCheckoutReceipt(Cart $cart): void
    {
        $items = $cart->getItems();
        $subtotal = 0.0;

        echo "** Checkout receipt **<br>";
        
        foreach ($items as $item) {
            $product = $item->getProduct();
            $quantity = $item->getQuantity();
            $name = $product->getName();
            $lineTotal = $item->getSubtotal();
            
            $subtotal += $lineTotal;
            echo $quantity . 'x ' . $name . " | " . $lineTotal . "<br>";
        }
        
        echo "----------------------<br>";
        
        $shipping = $cart->shippingFees();
        $amount = $subtotal + $shipping;
        
        echo "Subtotal: $subtotal<br>Shipping: $shipping<br>Amount: $amount<br>";

        echo "----------------------<br>";
    }


    


}