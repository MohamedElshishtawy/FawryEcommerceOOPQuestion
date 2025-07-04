<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'Models/Product.php';
include_once 'Models/PhysicalProduct.php';
include_once 'Models/PerishableProduct.php';
include_once 'Models/Expirable.php';
include_once 'Models/Shippable.php';


include_once 'Models/Customer.php';
include_once 'Models/DigitalProduct.php';
include_once 'Models/Cart.php';
include_once 'Models/CartItem.php';

include_once 'Services/FeesCalcsService.php';
include_once 'Services/CheckoutService.php';
include_once 'Services/ShippingService.php';
include_once 'Models/ShippingItem.php';


