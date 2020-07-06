<?php session_start(); ?>
<?php
	include("Model/config.php");
	$db = new Database;
	$db->connect();

	if(isset($_GET['c']))
	{
		$controller= $_GET['c'];
	}
	else
	{
		header("location:index.php?c=product&a=home");
	}

	switch ($controller) {
		case 'user':{
			require_once('Controller/user/index.php');
			break;
		}
		case 'product':{
			require_once('Controller/product/index.php');
			break;
		}
		case 'cart':{
			require_once('Controller/cart.php');
			break;
		}
	}
?>