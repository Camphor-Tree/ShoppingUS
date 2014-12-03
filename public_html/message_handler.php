<?php

class Message
{
	public $name = '匿名用户';
	public $content;
	public $timestamp;
}

session_start();
$message = (new Message);


if (isset($_POST["name"]))
{
	if($_POST["name"]=="")
	{
		unset($_SESSION["name"]);
		print_r("您的昵称不能为空");
		return;
	}
	$message->name = $_POST["name"];
	//set the session name
	$_SESSION["name"] = $_POST["name"];
}
else
{
	if(isset($_SESSION["name"]))
	{
		$message->name = $_SESSION["name"];
	}
}

if(isset($_POST["content"]))
{
	if($_POST["content"]=="")
	{
		print_r("留言内容不能为空 :)");
	}
	else
	{
	$file = './messages/messages.txt';
	$message->timestamp = time();
	$message->content = $_POST["content"];
	$message->name = $_POST["name"];
	
	$messages =  json_decode(file_get_contents($file));
	if($messages==null)
	{
		$messages=array();
	}
	array_push($messages,(array)$message);
	//print_r($result);
	// Write the contents to the file, 
	// using the FILE_APPEND flag to append the content to the end of the file
	// and the LOCK_EX flag to prevent anyone else writing to the file at the same time

	file_put_contents($file,json_encode($messages), LOCK_EX);
	print_r("谢谢您的留言");
	}
}
else
{
	print_r("留言内容不能为空 :)");
}

?>