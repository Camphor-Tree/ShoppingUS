<?php

function getBrandArray()
{
	header('Content-Type: text/html; charset=utf-8');
	//Read the shopping list into array
	$xmlPath="./brand_list.xml";
	$xml = simplexml_load_file($xmlPath);
	$json = json_encode($xml);
	$brand_list_array = json_decode($json,TRUE);
	$brand_array = $brand_list_array["brand"];


	// get all the category
	$category_array = array();
	foreach ($brand_array as $brand)
	{
		if(!in_array($brand["category"],$category_array))
		{
			array_push($category_array,$brand["category"]);
		}
	}

	//Split the products into each category.
	$brand_in_each_category_array = array();

	//delcare array() for each category
	foreach ($category_array as $category)
	{
		$brand_in_each_category_array[$category] = array();
	}

	//insert product into each category array
	foreach ($brand_array as $brand)
	{
		array_push($brand_in_each_category_array[$brand["category"]],$brand);
	}

	//print_r($products_in_each_category_array);

	return $brand_in_each_category_array;
}

?>