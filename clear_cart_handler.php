<?php
include './cart.php';
session_start();
$cart = (new ShoppingCart);
$cart->clearShoppingCart();
print_r("订单清除成功");

?>