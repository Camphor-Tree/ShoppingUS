<?php
include './data/brand_product_reader.php';
include './cart.php';

session_start();
if (isset($_POST["product"])) {
   $product=$_POST["product"];
   $cart = (new ShoppingCart);
   $cart->addProductToShoppingCart($product,$_POST["count"]);
   //print_r($cart->getShoppingCart());
}
?>