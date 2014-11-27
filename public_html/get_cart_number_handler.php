<?php
include './cart.php';
session_start();

$cart = (new ShoppingCart);

print_r($cart->getShoppingCartCount(););

?>