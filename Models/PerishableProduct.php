<?php

namespace Models;

use Expirable;
use PhysicalProduct;

include_once 'Expirable.php';


class PerishableProduct extends PhysicalProduct implements Expirable {


    private \DateTime $expirationDate;

    public function __construct(string $name, float $price, int $quantity ,float $weight, \DateTime $expirationDate, ) {
        parent::__construct($name, $price, $quantity, $weight);
        $this->expirationDate = $expirationDate;
    }

    public function getExpirationDate(): \DateTime {
        return $this->expirationDate;
    }

    public function isExpired(): bool {
        return new \DateTime() > $this->expirationDate;
    }


}