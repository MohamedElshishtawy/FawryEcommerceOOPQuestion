<?php 

namespace Models;
use Exception;

class Customer {

    private float $balance;

    public function __construct(float $balance) {
        $this->balance = $balance;
    }

    public function getBalance(): float {
        return $this->balance;
    }

    public function setBalance(float $balance): void {
        if ($balance < 0) {
            throw new Exception("Balance cannot be negative.");
        }
        $this->balance = $balance;
    }

    public function pay(float $price): void {
        if ($price > $this->getBalance()) {
            throw new Exception("Your balance is smaller than the amount you want to pay.");
        }

        $this->setBalance($this->getBalance() - $price);
        
    }

}