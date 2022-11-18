<?php 

    interface DiscountInterface 
    {
        /**
         * @param int $amount
         */
        public function getDiscount($amount);

    }