<?php 

require_once "DiscountInterface.php";

class WithoutDiscount extends Discount implements DiscountInterface 
{   
    public function getDiscount($amount = 0) 
    {
        $finalPrice = intval($amount);  
        
        $price = [
            'original' => intval($amount),
            'final' => $finalPrice,
            'discount' => null,
            'currency' => self::CURRENCY,
        ];
        
        http_response_code(200);     
        
        return $price;
    }  
}