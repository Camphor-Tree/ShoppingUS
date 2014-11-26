<?php
	function writeFile($file_name,$array)
	{
		$results = print_r($array, true);
		//$myfile = fopen("./data/".$file_name.".txt","w");
		file_put_contents($file_name, $results);
	}
?>
