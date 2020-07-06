<?php
if($_POST['request'])
{
	$quest=$_POST['request'];
	include('connect.php');
	switch ($quest) {
		case 1:
			$sql="SELECT * FROM SANPHAM where gia between 1000000 and 5000000 ";
			break;
		case 2:
			$sql="SELECT * FROM SANPHAM where gia between 5000001 and 10000000 ";
			break;
		case 3:
			$sql="SELECT * FROM SANPHAM where gia between 10000001 and 99999999999 ";
			break;
		case 4:
			$sql=$sql+"ORDER BY Gia DESC";
			break;			
		case 5:
			$sql=$sql+"ORDER BY Gia ASC";
			break;
	}
	$result=$conn->query($sql);
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



