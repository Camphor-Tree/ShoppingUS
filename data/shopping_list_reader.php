<?php

function getProductsCategoryArray()
{
	header('Content-Type: text/html; charset=utf-8');
	//Read the shopping list into array
	$xmlPath='./data/shopping_list.xml';
	$xml = simplexml_load_file($xmlPath);
	$json = json_encode($xml);
	$shopping_list_array = json_decode($json,TRUE);
	$product_array = $shopping_list_array["product"];

	//print_r($product_array);


	// get all the category
	$category_array = array();
	foreach ($product_array as $product)
	{
		if(!in_array($product["category"],$category_array))
		{
			array_push($category_array,$product["category"]);
		}
	}

	//Split the products into each category.
	$products_in_each_category_array = array();

	//delcare array() for each category
	foreach ($category_array as $category)
	{
		$products_in_each_category_array[$category] = array();
	}

	//insert product into each category array
	foreach ($product_array as $product)
	{
		array_push($products_in_each_category_array[$product["category"]],$product);
	}

	//print_r($products_in_each_category_array);

	return $products_in_each_category_array;
}

?>