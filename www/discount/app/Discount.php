<?php 

class Discount {
   
    private $amount = 0;
    
    public function __construct($amount = 0) 
    {
        $this->amount = $amount;
    }
    
    public function discountAmount() 
    {
        require_once "SkuDiscount.php";
        require_once "MaxDiscount.php";
        require_once "WithoutDiscount.php";

        if($this->amount >= 500) {
            $payment = new SkuDiscount();
        } else {
            $payment = new MaxDiscount();
        }
        
        $payment->getDiscount($this->amount);
    }
}