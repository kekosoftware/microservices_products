<?php

namespace Mytheresa;

use PHPUnit\Framework\TestCase;

class DiscountTest extends TestCase
{
    public function testDiscounts_Maximun()
    {
        $price = 10000;
        $sku = 3;
        $category = "boots";
        
        $expected = '{"original":10000,"final":7000,"discount":"30%","currency":"EUR"}';

        $curl = curl_init();
       
        $uri  = 'http://192.168.20.20/';
        $uri .= '?price='.$price;
        $uri .= '&sku='.$sku;
        $uri .= '&category='.$category;
    
        curl_setopt($curl, CURLOPT_URL, $uri);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
    
        $actual = curl_exec($curl);

        $this->assertEquals($expected, trim($actual));
    }

    public function testDiscounts_Category()
    {
        $price = 10000;
        $sku = 5;
        $category = "boots";
        
        $expected = '{"original":10000,"final":7000,"discount":"30%","currency":"EUR"}';

        $curl = curl_init();
       
        $uri  = 'http://192.168.20.20/';
        $uri .= '?price='.$price;
        $uri .= '&sku='.$sku;
        $uri .= '&category='.$category;
    
        curl_setopt($curl, CURLOPT_URL, $uri);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
    
        $actual = curl_exec($curl);

        $this->assertEquals($expected, trim($actual));
    }

    public function testDiscounts_SKU()
    {
        $price = 10000;
        $sku = 3;
        $category = "sneakers";
        
        $expected = '{"original":10000,"final":8500,"discount":"15%","currency":"EUR"}';

        $curl = curl_init();
       
        $uri  = 'http://192.168.20.20/';
        $uri .= '?price='.$price;
        $uri .= '&sku='.$sku;
        $uri .= '&category='.$category;
    
        curl_setopt($curl, CURLOPT_URL, $uri);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
    
        $actual = curl_exec($curl);

        $this->assertEquals($expected, trim($actual));
    }

    public function testDiscounts_None()
    {
        $price = 10000;
        $sku = 5;
        $category = "sneakers";
        
        $expected = '{"original":10000,"final":10000,"discount":null,"currency":"EUR"}';

        $curl = curl_init();
       
        $uri  = 'http://192.168.20.20/';
        $uri .= '?price='.$price;
        $uri .= '&sku='.$sku;
        $uri .= '&category='.$category;
    
        curl_setopt($curl, CURLOPT_URL, $uri);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
    
        $actual = curl_exec($curl);

        $this->assertEquals($expected, trim($actual));
    }
}