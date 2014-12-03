<?php 
	include './file_operator.php';
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
				//session_start();
				$_SESSION['shoppingCart'] = array();
			}
		}
		
		public function addProductToShoppingCart($product,$count)
		{
			$this->shoppingCartInitialize();

			if(count($_SESSION['shoppingCart'])>0)
			{

				$exist = false;
				$id=0;
				//check whether the product already exist in shopping cart
				foreach($_SESSION['shoppingCart'] as $cartProduct)
				{
					if($cartProduct['name'] == $product['name'])
					{
						//$cartProduct["count"] = $cartProduct["count"] + $count;
						$exist = true;
						break;
					}
					$id++;
				}
			
				if($exist)
				{
					$_SESSION['shoppingCart'][$id]['count'] += $count;
				}else
				{
					//if not exist, just insert into the cart;
				 $product["count"] = $count;
				 array_push($_SESSION['shoppingCart'],$product);
				}
			
			}else
			{
			$product["count"] = $count;
			array_push($_SESSION['shoppingCart'],$product);
			}
		}
		
		public function checkout($name, $contact, $comment)
		{
			if(isset($_SESSION['shoppingCart']))
			{
				date_default_timezone_set('America/Los_Angeles');
				$date = date('Ymd-Hi',time());
				$orderFileName = "./orders/".$date."-".uniqid().".txt";
				$_SESSION['shoppingCart']["name"]=$name;
				$_SESSION['shoppingCart']["contact"]=$contact;
				$_SESSION['shoppingCart']["comment"]=$comment;
				writeFile($orderFileName, $_SESSION['shoppingCart']);
				$this->clearShoppingCart();
			}
		}
		
		public function clearShoppingCart()
		{
			// remove all session variables
			if(isset($_SESSION['shoppingCart']))
			{
				//just clear the shopping cart, won't clear the session for name
			    unset($_SESSION['shoppingCart']);
				//session_unset(); 
				//session_destroy();
			}
		}
		
		public function getShoppingCartCount()
		{
			if(isset($_SESSION['shoppingCart']))
			{
				return count($_SESSION['shoppingCart']);
			}
			else
			{
				return 0;
			}
		}
		
		public function getShoppingCart()
		{
			if(isset($_SESSION['shoppingCart']))
			{
				return $_SESSION['shoppingCart'];
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