<?php

class Product{
    // Connection
    private $conn;
   
    // Db connection
    public function __construct($db) 
    {
        $this->conn = $db;
    }

    /**
     * * GET PRODUCTS
     */
    public function getProducts(){
        // FETCH
        $stmt = $this->conn->prepare(
            "SELECT 
                p.sku,
                p.productName as name,
                c.categoryName as category,
                p.price
             FROM 
                Products p 
             INNER JOIN 
                Categories c 
             ON 
                p.categoryID = c.categoryID"
            );

        $stmt->execute();
        $myProducts = $stmt->fetchAll(PDO::FETCH_OBJ);

        foreach ($myProducts as $myProduct) {
            $price = $this->getDiscount($myProduct);

            $products[] = [
                'sku' => str_pad($myProduct->sku, 6, "0", STR_PAD_LEFT),
                'name' => $myProduct->name,
                'category' => $myProduct->category,
                'price' => json_decode($price),
            ];
        }
        
        return $products;
    }

    /**
     * * GET DISCOUNT
     * @param product 
     */
    public function getDiscount($product) 
    {
        $curl = curl_init();
   
        $uri  = 'http://192.168.20.20/';
        $uri .= '?price='.intval($product->price);
        $uri .= '&sku='.intval($product->sku);
        $uri .= '&category='.$product->category;
    
        curl_setopt($curl, CURLOPT_URL, $uri);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
    
        return curl_exec($curl);

        
    }
}