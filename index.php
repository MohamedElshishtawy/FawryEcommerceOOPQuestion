<?php

include_once 'autoload.php';

use Models\Cart;
use Models\Customer;
use Models\DigitalProduct;
use Models\PerishableProduct;


// System products
$windows11 = new DigitalProduct('Windows 11 activation code', 1000.0, 5);
$laptop    = new PhysicalProduct('Laptop', 1000.0, 5, 1500);
$milk      = new PerishableProduct('Milk', 10.0, 5, 100, new \DateTime('+ 1 week'));
$bread      = new PerishableProduct('bread', 1.0, 5, 10, new \DateTime('- 1 week'));


// Start the e-commerce system
$customer = new Customer(30000.0);
$cart     = new Cart();

$cart->append($windows11, 1);
$cart->append($laptop, 1);
$cart->append($milk, 1);
// $cart->append($bread, 1); // This product is expired


// Checkout and pay
CheckoutService::checkout($customer, $cart);

echo '<br>';

echo "Customer balance after checkout: " . $customer->getBalance() . "<br>";



