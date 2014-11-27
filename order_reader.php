<html>
<?php

	header('Content-Type: text/html; charset=utf-8');


$dir = "./orders/";

$dh  = opendir($dir);
$id=0;
while (false !== ($filename = readdir($dh))) {
$id++;
if($id>2)
{
	$str = file_get_contents('./orders/'.$filename);
	//$arr = unserialize($str);
	print_r('Order'.($id-2)); 
	print_r('   '.$filename);
	print_r('</br>');
	print_r($str);
	print_r('</br>');
	print_r('</br>');
}
}

?>
</html>