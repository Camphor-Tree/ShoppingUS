<?php
$xmlPath="./shopping_list.xml";
$xml = simplexml_load_file($xmlPath);
$json = json_encode($xml);
$array = json_decode($json,TRUE);

$category_array = array();



?>