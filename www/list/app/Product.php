<?php

class Product
{    
    private $conn;
    private $category = '';
    private $priceLessThan = 0;
   
    public function __construct($category, $priceLessThan) 
    {
        require_once 'app/Database.php';
        $database = new Database();
        
        $this->conn = $database->getConnection();
        $this->category = $category;
        $this->priceLessThan = $priceLessThan;
    }

    /**
     * * GET PRODUCTS
     */
    public function getProducts()
    {
        try {
            // Consulting database
            $sql = "SELECT 
                        p.sku,
                        p.productName as name,
                        c.categoryName as category,
                        p.price
                    FROM 
                        Products p 
                    INNER JOIN 
                        Categories c 
                    ON 
                        p.categoryID = c.categoryID";
         
            if ($this->category != '' && $this->priceLessThan != 0) {
                $sql .= " WHERE c.`categoryName` = '$this->category'";
                $sql .= " AND p.`price` < ".$this->priceLessThan;
            } elseif ($this->category != '') {
                $sql .= " WHERE c.`categoryName` = '$this->category'";
            } elseif ($this->priceLessThan != 0) {
                $sql .= " WHERE p.`price` < ".$this->priceLessThan;
            }
            
            $stmt = $this->conn->prepare($sql);
    
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

        } catch (\Throwable $th) {
            return "An error occurred while recovery the products. ".$th;
        }
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