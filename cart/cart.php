<?php 
	include './cart/file_operator.php';
	class ShoppingCart
	{
		public $id;
		
		public function shoppingCartInitialize()
		{
			//check whether session already setup
			if(!isset($_SESSION["shoppingCart"]))
			{
				$this->id = uniqid();
				// Start the session
				session_start();
				$_SESSION["shoppingCart"] = array();
			}
		}
		
		public function addProductToShoppingCart($product,$count)
		{
			$this->shoppingCartInitialize();
			$cart = $_SESSION["shoppingCart"];

			if(count($cart)==0)
			{
				$product["count"] = $count;
				array_push($cart,$product);
			}
			else
			{
				//$exist = false;
				//check whether the product already exist in shopping cart
				foreach($cart as $cartProduct)
				{
					if($cartProduct["name"] == $product["name"])
					{
						$cartProduct["count"] = $cartProduct["count"] + $count;
						$exist = true;
						break;
					}
				}
				
				//if not exist, just insert into the cart;
				//if(!$exist)
				//{
				 $product["count"] = $count;
				 array_push($cart,$product);
				//}
			
			}
							 $product["count"] = $count;
				 array_push($cart,$product);
			$_SESSION["shoppingCart"] = $cart;
		}
		
		public function checkout($name, $contact, $comment)
		{
			if(isset($_SESSION["shoppingCart"]))
			{
				date_default_timezone_set('America/Los_Angeles');
				$date = date('Ymd-Hi',time());
				$orderFileName = "./orders/".$date."-".$this->id.".txt";
				$shoppingCart = $_SESSION["shoppingCart"];
				$shoppingCart["name"]=$name;
				$shoppingCart["contact"]=$contact;
				$shoppingCart["comment"]=$comment;
				writeFile($orderFileName, $shoppingCart);
				$this->clearShoppingCart();
				return $shoppingCart;
			}
		}
		
		public function clearShoppingCart()
		{
			// remove all session variables
			//session_unset(); 
			if(isset($_SESSION["shoppingCart"]))
			{
				//session_destroy();
				//unset($_SESSION["shoppingCart"]);
			}
		}
		
		public function getShoppingCartCount()
		{
			if(isset($_SESSION["shoppingCart"]))
			{
				return count($_SESSION["shoppingCart"]);
			}
			else
			{
				return 0;
			}
		}
		
		public function getShoppingCart()
		{
			if(isset($_SESSION["shoppingCart"]))
			{
				return $_SESSION["shoppingCart"];
			}
			else
			{
				return array();
			}
		
		}
		
		public function getId() 
		{
        return $this->id;
		}
		
	}

?>