<?php

try {

    // FILTERS
    $category = $_GET['category'];
    $priceLessThan = $_GET['priceLessThan'];

    require_once 'app/Product.php';
    
    $items = new Product($category, $priceLessThan);
    
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