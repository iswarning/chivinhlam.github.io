<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#img{
			height: 40px;
			width: 40px;
			float: left;
		}
		.right p
		{
			margin:0;
			padding: 0;
		}
		div.left
		{
			width: 30%;
		}
		div.left{
			width: 70%;
		}
		.rowsearch
		{
			height: 62px;
			font-size: 15px;
		}
		.bottom{
			color: red;
		}
		.top{
			font-weight: bold;
			color: black;
		}
	</style>
</head>
<body>
	<?php
		$q=$_REQUEST['q'];
		$search="";

		include('connect.php');
		$sql="SELECT * FROM SANPHAM WHERE TenSanPham like '%".$q."%'";
		$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_array($result))
		{
			$search=$search."
			<a class='rowsearch' href='productdetail.php?MaSanPham=".$row['MaSanPham']."'>
				<div class='all'>
					<div class='left'><img id='img' src='".$row['HinhAnh']."' /></div>
					<div class='right'>
						<div class='top'><p>".$row['TenSanPham']."</p></div>
						<div class='bottom'><p>".number_format($row['Gia'])."</p></div>
					</div>
				</div>

			</a><hr/>";
		}
		echo $search;
	?>


</body>
</html>