<?php

class Product
{    
    private $conn;
   
    public function __construct() 
    {
        require_once 'app/Database.php';
        $database = new Database();
        
        $this->conn = $database->getConnection();
    }

    /**
     * * GET PRODUCTS
     */
    public function getProducts()
    {
        // Consulting database
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
        try {
            $curl = curl_init();
       
            $uri  = 'http://192.168.20.20/';
            $uri .= '?price='.intval($product->price);
            $uri .= '&sku='.intval($product->sku);
            $uri .= '&category='.$product->category;
        
            curl_setopt($curl, CURLOPT_URL, $uri);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HEADER, false);
        
            return curl_exec($curl);

        } catch (\Throwable $th) {
            return "An error occurred while recovery the discount. ".$th;
        } 

        
    }
}