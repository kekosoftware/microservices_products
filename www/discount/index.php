
<?php 

require_once('./app/Discount.php');

$cart = new Discount($_GET['price'], $_GET['sku'], $_GET['category']);
echo json_encode($cart->discountAmount());