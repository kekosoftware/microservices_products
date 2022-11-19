<?php 

class Discount {
   
    private $amount = 0;
    private $sku = 0;
    private $category = '';

    const DISCOUNT_CATEGORY = 0.30;
    const DISCOUNT_SKU = 0.15;
    const CURRENCY = 'EUR';
    
    public function __construct($amount = 0, $sku = 0, $category = '') 
    {
        $this->amount = intval($amount);
        $this->sku = intval($sku);
        $this->category = $category;
    }
    
    public function discountAmount() 
    {
        require_once "SkuDiscount.php";
        require_once "CategoryDiscount.php";
        require_once "MaxDiscount.php";
        require_once "WithoutDiscount.php";

        if ($this->category === 'boots' && $this->sku === 3) {
            $payment = new MaxDiscount();
        } elseif ($this->category === 'boots') {
            $payment = new CategoryDiscount();
        } elseif ($this->sku === 3) {
            $payment = new SkuDiscount();
        } else {
            $payment = new WithoutDiscount();
        }
        
        return $payment->getDiscount($this->amount);
    }
}