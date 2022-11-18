<?php

class Product{
    // Connection
    private $conn;
   
    // Db connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // GET ALL
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
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        
        return $stmt;
    }
}