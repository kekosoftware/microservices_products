<?php 

require_once "DiscountInterface.php";

class CategoryDiscount extends Discount implements DiscountInterface 
{   
    public function getDiscount($amount = 0) 
    {
        $discount = self::DISCOUNT_CATEGORY;
        
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