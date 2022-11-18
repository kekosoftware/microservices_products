<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once 'config/Database.php';
include_once 'class/Product.php';

$database = new Database();
$db = $database->getConnection();
 
$items = new Product($db);

$items->id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

$result = $items->getProducts();

if (!empty($result)) {    
    while ($row = $result->fetch()){
        $products[] = [
            'sku' => str_pad($row['sku'], 6, "0", STR_PAD_LEFT),
            'name' => $row['name'],
            'category' => $row['category'],
            'price' => [
                'original' => intval($row['price']),
                'final' => intval($row['price']),
                'discount_percentage' => '30%',
                'currency' => 'EUR',
            ]
        ]; 
    }
        
    http_response_code(200);     
    echo json_encode($products);
} else {   
    http_response_code(404);     
    echo json_encode(
        array("message" => "No item found.")
    );
} 