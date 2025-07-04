<?php 


namespace Services;

use Exception;


class FeesCalcsService {
    private const float FEES = 10.0; // 10$ per 100 gram 
    private const float UNIT = 100.0;


    public static function calcShippingFees(float $weight): float {
        if ($weight <= 0) {
            throw new Exception("Weight must be greater than zero.");
        }

        return ceil($weight / self::UNIT) * self::FEES;
    }
        

}