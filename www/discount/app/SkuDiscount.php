<?php 

require_once "DiscountInterface.php";

class SkuDiscount extends Discount implements DiscountInterface 
{   
    public function getDiscount($amount = 0) 
    {
        $discount = self::DISCOUNT_SKU;
        
        $finalPrice = intval($amount) - intval($amount) * $discount;  
        
        $price = [
            'original' => intval($amount),
            'final' => $finalPrice,
            'discount' => $discount * 100 ."%",
            'currency' => self::CURRENCY,
        ];
        
        http_response_code(200);     
        
        return $price;
    }    
}