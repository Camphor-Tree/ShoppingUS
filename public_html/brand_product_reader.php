<?php

function getProductsBrandArray()
{
	header('Content-Type: text/html; charset=utf-8');
	//Read the shopping list into array
	$xmlPath='../data/shopping_list.xml';
	$xml = simplexml_load_file($xmlPath);
	$json = json_encode($xml);
	$shopping_list_array = json_decode($json,TRUE);
	$product_array = $shopping_list_array["product"];

	//print_r($product_array);


	// get all the brand
	$brand_array = array();
	foreach ($product_array as $product)
	{
		if(!in_array($product["brand"],$brand_array))
		{
			array_push($brand_array,$product["brand"]);
		}
	}

	//Split the products into each brand.
	$products_in_each_brand_array = array();

	//delcare array() for each brand
	foreach ($brand_array as $brand)
	{
		$products_in_each_brand_array[$brand] = array();
	}

	//insert product into each brand array
	foreach ($product_array as $product)
	{
		array_push($products_in_each_brand_array[$product["brand"]],$product);
	}

	//print_r($products_in_each_brand_array);

	return $products_in_each_brand_array;
}

?>