<?php
	session_start();
	if(isset($_POST['addtocart']))
	{
		if(isset($_SESSION['shoppingcart']))
		{
			$array_id=array_column($_SESSION['shoppingcart'], 'item_id');
			if(!in_array($_GET['MaSanPham'], $array_id))
			{
				$count = count($_SESSION['shoppingcart']);
				$item_array= array(
					'item_id' => $_GET['MaSanPham'],
					'item_name' => $_POST['name'],
					'item_price' => $_POST['price'],
					'item_quantity' => $_POST['quantity']
				);
				$_SESSION['shoppingcart'][$count]=$item_array;
			}
			else
			{
				echo '<script>alert("Item Already Added")</script>'; 
			}
		}
		else
		{
			$item_array=array(
				'item_id' => $_GET['MaSanPham'],
				'item_name' => $_POST['name'],
				'item_price' => $_POST['price'],
				'item_quantity' => $_POST['quantity']
			);
			$_SESSION['shoppingcart'][0]=$item_array;
		}
	}
	if(isset($_GET['action']))
	{
		if($_GET['action']=='delete')
		{
			foreach ($_SESSION['shoppingcart'] as $keys => $values) 
			{
				if($values['item_id']==$_GET['MaSanPham'])
				{
					unset($_SESSION['shoppingcart'][$keys]);
					echo '<script>alert("Item Removed")</script>';
				}
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart</title>
	<?php include('module/header.php') ?>
</head>
<body style="margin-top: 100px;">
	<a href="index.php"><i class="fa fa-arrow-left"></i> Continue Shopping</a>
	<table border="1px solid">
		<tr>
			<th width="40%">Item Name</th>
			<th width="10%">Quantity</th>
			<th width="20%">Price</th>
			<th width="15%">Total</th>
			<th width="5%">Action</th>
		</tr>
		<?php
			if(!empty($_SESSION["shoppingcart"]))
			{
				$num = 0;
				$total = 0;
				foreach($_SESSION["shoppingcart"] as $keys => $values)
				{
		?>
			<tr>
				<td><?php echo $values["item_name"]; ?></td>
				<td><?php echo $values["item_quantity"]; ?></td>
				<td>$ <?php echo $values["item_price"]; ?></td>
				<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
				<td><a href="shoppingcart.php?action=delete&MaSanPham=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
			</tr>
		<?php
				$total = $total + ($values["item_quantity"] * $values["item_price"]);
				$num = $num + 1;

			}
		?>
			<tr>
				<td colspan="3" align="right">Total</td>
				<td align="right">$ <?php echo number_format($total, 2); ?></td>
				<td></td>
			</tr>
			<?php
			}
		?>
	</table>
</body>
</html>