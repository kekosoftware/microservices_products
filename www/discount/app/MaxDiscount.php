<?php 

require_once "DiscountInterface.php";

class MaxDiscount implements DiscountInterface 
{   
    public function getDiscount($amount = 0) 
    {
        echo "Paying ". $amount. " using Credit Card";
    }  
}