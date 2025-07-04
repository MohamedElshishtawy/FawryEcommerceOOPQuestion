<?php

use Models\Cart;
use Models\Customer;
use Models\Shippable;

class CheckoutService {


    public static function checkout(Customer $customer, Cart $cart): void
    {
        $items = $cart->getItems();
        $totalWeight = 0.0;
        $shipmentLines = [];
        $weightLines = [];
        $receiptLines = [];
        $subtotal = 0.0;
        $shipping = 0.0;

        // Shipment notice
        echo "** Shipment notice **<br>";
        foreach ($items as $item) {
            $product = $item->getProduct();
            $quantity = $item->getQuantity();
            $name = $product->getName();
            
            if ($product instanceof Shippable) {
                $totalWeight += $product->getWeight() * $quantity;
                echo $quantity . 'x ' . $name . ' | ' . $product->getWeight() . 'gram<br>';
            }
        }
        
        echo 'Total package weight ' . ($totalWeight/1000) . 'kg<br>';

        echo "----------------------<br>";

        // Checkout receipt
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

        $customer->pay($amount);
    }


}