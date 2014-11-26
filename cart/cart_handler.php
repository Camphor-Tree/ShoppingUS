<?php
include '../data/brand_product_reader.php';
include './file_operator.php';
include './cart.php';

if (isset($_POST["product"])) {
   $product=$_POST["product"];
   $cart = (new ShoppingCart);
   $cart->addProductToShoppingCart($product,$_POST["count"]);
   writeFile("./test.txt",$cart->getShoppingCart());
   echo $cart->getShoppingCart();
}
else
{
  $aa = array();
  array_push($aa,1);
  writeFile("../orders/test.txt",$aa);
}
?>