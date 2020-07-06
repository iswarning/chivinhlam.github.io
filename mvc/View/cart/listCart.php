
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<h3>SHOPPING CART</h3>
	<a href="index.php?c=product&a=home">Continue Shopping</a></br>
	<?php
	if(empty($_SESSION['cart'])){
		echo "Bạn chưa có sản phẩm nào trong giỏ hàng";
		session_destroy();
	}
	else
	{
		echo "<form action='index.php?c=cart&a=update' method='POST'>";
		echo "<table class='table table-bordered'>";
		echo "<tr>";
		echo "<td>Name </td>";
		echo "<td>Price </td>";
		echo "<td>Quantity </td>";
		echo "<td>Total </td>";
		echo "<td>Action </td>";
		echo "</tr>";
		if(!empty($_SESSION['cart']))
		{
			$total=0;
			foreach($_SESSION['cart'] as $list)
			{			
				echo "<tr>";
				echo "<td>".$list["TenSanPham"]."</td>";
				echo "<td>".number_format($list['Gia'])."</td>";
				echo "<td><input type='number' value='".$list["qty"]."' name='qty[".$list['MaSanPham']."]'></td>";
				echo "<td>".number_format($list['qty'] * $list['Gia'])."</td>";
				echo "<td>";
				echo "<a href='index.php?c=cart&a=delete&id=".$list['MaSanPham']."'>Delete</a>";
				echo "</td>";
				echo "</tr>";
				$total = $total + ($list['qty'] * $list['Gia']);
				
			}
			echo "<tr>
				<td></td>
				<td></td>
				<td></td>
				<td>".number_format($total)."</td>
				<td><input type='submit' value='UPDATE' name='update'></td>
			</tr>";
			echo "</table>";
		}
		echo "</form>";
			
	}
		
	?>
</body>
</html>