<?php

namespace Mytheresa;

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testProducts_List()
    {
        //require_once "app/Number.php";

        $value = "12";
        
        $expected = "12";
        
        $this->assertEquals($expected, $value);
    }
}