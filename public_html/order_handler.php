<?php
include './cart.php';
session_start();
if (isset($_POST["name"])&&isset($_POST["contact"])) {
   $name=$_POST["name"];
   $contact=$_POST["contact"];
   $comment="无";
   if($name=="")
   {
		if(isset($_SESSION["name"]))
		{
			$name = $_SESSION["name"];
		}
		else
		{
			print_r("姓名不能为空!");
			return;
		}
   }
   if($contact=="")
   {
	print_r("我们需要联系方式来联系您 :)");
	return;
   }
   
   if(isset($_POST["comment"]))
   {
	$comment=$_POST["comment"];
   }
   $cart = (new ShoppingCart);
   $cart->checkout($name, $contact, $comment);
   print_r("订单提交成功,logpie会尽快联系您");
}
else
{
  print_r("订单提交失败");
}
?>