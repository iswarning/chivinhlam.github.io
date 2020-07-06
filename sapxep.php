<?php
if($_POST['sapxep'])
{
	$sapxep=$_POST['sapxep'];
	include('connect.php');
	switch ($sapxep) {
		case 1:
			$sql="SELECT * FROM SANPHAM order by gia asc";
			break;
		case 2:
			$sql="SELECT * FROM SANPHAM order by gia desc";
			break;
		
		default:
			die();
			break;
	}

	$result=mysqli_query($conn,$sql);
	while($row = mysqli_fetch_assoc($result))
	{

	 ?>
	<div>
		<p><?php echo $row['TenSanPham'].""; ?></p>
		<span><?php echo $row['Gia']; ?></span>
	</div>
	<?php
		}
		mysqli_close($conn);
	}
	?>