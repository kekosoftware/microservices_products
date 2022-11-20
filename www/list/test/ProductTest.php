<?php

namespace Mytheresa;

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testProducts_List_filter_with_category_and_priceLessThan()
    {
        $category = "boots";
        $priceLessThan = 80000;
        
        $expected = '[{"sku":"000002","name":"Suede Derby shoes","category":"boots","price":{"original":71500,"final":50050,"discount":"30%","currency":"EUR"}},{"sku":"000003","name":"Ashlington leather ankle boots","category":"boots","price":{"original":71000,"final":49700,"discount":"30%","currency":"EUR"}}]';

        $curl = curl_init();
       
        $uri  = 'http://192.168.10.10/';
        $uri .= '?category='.$category;
        $uri .= '&priceLessThan='.$priceLessThan;
    
        curl_setopt($curl, CURLOPT_URL, $uri);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
    
        $actual = curl_exec($curl);

        $this->assertEquals($expected, $actual);
    }

    public function testProducts_List_filter_with_category()
    {
        $category = "boots";
        
        $expected = '[{"sku":"000001","name":"BV Lean leather ankle boots","category":"boots","price":{"original":89000,"final":62300,"discount":"30%","currency":"EUR"}},{"sku":"000002","name":"Suede Derby shoes","category":"boots","price":{"original":71500,"final":50050,"discount":"30%","currency":"EUR"}},{"sku":"000003","name":"Ashlington leather ankle boots","category":"boots","price":{"original":71000,"final":49700,"discount":"30%","currency":"EUR"}}]';

        $curl = curl_init();
       
        $uri  = 'http://192.168.10.10/';
        $uri .= '?category='.$category;
    
        curl_setopt($curl, CURLOPT_URL, $uri);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
    
        $actual = curl_exec($curl);

        $this->assertEquals($expected, $actual);
    }

    public function testProducts_List_filter_with_priceLessThan()
    {
        $priceLessThan = 80000;
        
        $expected = '[{"sku":"000002","name":"Suede Derby shoes","category":"boots","price":{"original":71500,"final":50050,"discount":"30%","currency":"EUR"}},{"sku":"000003","name":"Ashlington leather ankle boots","category":"boots","price":{"original":71000,"final":49700,"discount":"30%","currency":"EUR"}},{"sku":"000005","name":"BV Lean leather ankle boots","category":"sneakers","price":{"original":59000,"final":59000,"discount":null,"currency":"EUR"}},{"sku":"000006","name":"Horsebit jacquard loafer","category":"loafers","price":{"original":58500,"final":58500,"discount":null,"currency":"EUR"}},{"sku":"000007","name":"Mirrored G fringed leather loafers","category":"loafers","price":{"original":66500,"final":66500,"discount":null,"currency":"EUR"}},{"sku":"000008","name":"Veluso suede espadrilles","category":"espadrilles","price":{"original":15900,"final":15900,"discount":null,"currency":"EUR"}},{"sku":"000009","name":"Embroidered logo canvas espadrilles","category":"espadrilles","price":{"original":25500,"final":25500,"discount":null,"currency":"EUR"}},{"sku":"000010","name":"Horsebit slippers","category":"slippers","price":{"original":45500,"final":45500,"discount":null,"currency":"EUR"}}]';

        $curl = curl_init();
       
        $uri  = 'http://192.168.10.10/';
        $uri .= '?priceLessThan='.$priceLessThan;
    
        curl_setopt($curl, CURLOPT_URL, $uri);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
    
        $actual = curl_exec($curl);

        $this->assertEquals($expected, $actual);
    }

    public function testProducts_List_without_filter()
    {
        $expected = '[{"sku":"000001","name":"BV Lean leather ankle boots","category":"boots","price":{"original":89000,"final":62300,"discount":"30%","currency":"EUR"}},{"sku":"000002","name":"Suede Derby shoes","category":"boots","price":{"original":71500,"final":50050,"discount":"30%","currency":"EUR"}},{"sku":"000003","name":"Ashlington leather ankle boots","category":"boots","price":{"original":71000,"final":49700,"discount":"30%","currency":"EUR"}},{"sku":"000004","name":"Naima embellished suede sandals","category":"sandals","price":{"original":89000,"final":89000,"discount":null,"currency":"EUR"}},{"sku":"000005","name":"BV Lean leather ankle boots","category":"sneakers","price":{"original":59000,"final":59000,"discount":null,"currency":"EUR"}},{"sku":"000006","name":"Horsebit jacquard loafer","category":"loafers","price":{"original":58500,"final":58500,"discount":null,"currency":"EUR"}},{"sku":"000007","name":"Mirrored G fringed leather loafers","category":"loafers","price":{"original":66500,"final":66500,"discount":null,"currency":"EUR"}},{"sku":"000008","name":"Veluso suede espadrilles","category":"espadrilles","price":{"original":15900,"final":15900,"discount":null,"currency":"EUR"}},{"sku":"000009","name":"Embroidered logo canvas espadrilles","category":"espadrilles","price":{"original":25500,"final":25500,"discount":null,"currency":"EUR"}},{"sku":"000010","name":"Horsebit slippers","category":"slippers","price":{"original":45500,"final":45500,"discount":null,"currency":"EUR"}}]';

        $curl = curl_init();
       
        $uri  = 'http://192.168.10.10/';
    
        curl_setopt($curl, CURLOPT_URL, $uri);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
    
        $actual = curl_exec($curl);

        $this->assertEquals($expected, $actual);
    }
}