<?php 

namespace Models;
use Exception;

class Customer {

    public float $balance;

    public function __construct(float $balance) {
        $this->balance = $balance;
    }

    public function getBalance(): float {
        return $this->balance;
    }

    public function pay(float $price): void {
        if ($price > $this->balance) {
            throw new Exception("Your balance is smaller than the amount you want to pay.");
        }
        $this->balance -= $price;
    }

}