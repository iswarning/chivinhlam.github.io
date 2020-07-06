<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="//code.jquery.com/jquery-3.4.1.min.js"></script>
<style type="text/css">
	*{
		margin:0;
		padding: 0;
	}
	ul{
		list-style: none;
	}
	#menu{
		background-color: red;
		color: white;
	}
	#menu ul{
		top: 42px;
		left: 0;
		display: none;
		position: absolute;
	}
	#menu li{
		float: left;
		position: relative;
		width: 150px;
		line-height: 1.5em;
		text-align: center;
		color: blue;
		background: teal;
		padding: 10px;
	}
	#menu li:hover{
		cursor: pointer;
	}
	a{
		text-decoration: none;
		color: #fed700;
	}
</style>
</head>
<body>
	<?php
		function menu($parent = 0){
			$conn=mysqli_connect('localhost','root','','qlda');
			mysqli_set_charset($conn,"utf8");
			$sql="SELECT * FROM LOAISANPHAM WHERE parent = '$parent'";
			$result=mysqli_query($conn,$sql);
			
			if(mysqli_num_rows($result) > 0){
				echo "<ul id='menu'>";
				while($row=mysqli_fetch_array($result)){
					
					echo "<li><a href='#'>".$row['TenLoai'];
					
					menu($row['MaLoai']);

					echo "</a></li>";
				}
				echo "</ul>";
			}
		}
		menu();
	?>
	<?php if(isset($_SESSION['cart'])) echo count($_SESSION['cart']); else echo "0";?><a href="index.php?c=cart&a=listCart">  View</a>
	<?php
	echo "<ul>";
		foreach($data as $values)
		{
			echo "<li>".$values['MaSanPham']."</li>";
			echo "<li>".$values['TenSanPham']."</li>";
			echo "<li>".$values['Gia']."</li><a href='index.php?c=cart&a=addtocart&id=".$values['MaSanPham']."'>Mua</a><br>";
		}
	echo "</ul>";
	?>

	<script type="text/javascript">
	$(document).ready(function(){
		$("#menu li").hover(function(){
			$(this).find("ul:first").slideDown(600);
		}, function(){
			$(this).find("ul:first").hide(400);
		});
	});
</script>
</body>
</html>



