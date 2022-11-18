
<?php 

require_once('./app/Discount.php');

$cart = new Discount(499);
$cart->discountAmount();
echo "<br>";
// Output
//Paying 499 using PayPal

$cart = new Discount(501);
$cart->discountAmount();

//Output 
//Paying 501 using Credit Card