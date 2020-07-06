<?php
	$servername="localhost";
	$username="id9494374_root";
	$password="123456";
	$dbname="id9494374_qlda";

	$conn=mysqli_connect($servername,$username,$password,$dbname);
	if(!$conn)
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	else{
		mysqli_set_charset($conn,'utf8');
	}
?>