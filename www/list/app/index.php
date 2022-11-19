<?php

try {
    include_once 'config/Database.php';
    include_once 'class/Product.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $items = new Product($db);
    
    $result = $items->getProducts();
    
    if (!empty($result)) {    
        http_response_code(200);     
        echo json_encode($result);
    } else {   
        http_response_code(404);     
        echo json_encode(
            array("message" => "No item found.")
        );
    } 
} catch (\Throwable $th) {
    return "An error occurred: ".$th;
}