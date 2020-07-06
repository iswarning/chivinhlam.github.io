<?php session_start(); ?>
<?php
	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		*{
			margin: 0;
			font-family: arial;
			font-size: 15px;
		}

		h6{
			color: red;
		}
		ul{
			list-style: none;
		}
		a{text-decoration: none;}
		a:after{color: red;}
		a:hover{color: red;}
		li{padding: 10px;float: left;}
		td{text-align: center;padding: 5px;}
		th{text-align: center;padding: 5px;}
	</style>
</head>
<body>
	<?php 
	if(isset($_SESSION['user']))
	{
		if($_SESSION['user']=="admin" && $_SESSION['valid']=true)
		{
			echo "<h6><a href='index.php'>HOME</a></h6>";
		}
		else
		{
			echo "Bạn không phải admin";
		}
	}
	else{
		header("location:login.php");
	}		
	?>
	<ul>
		<li><a href="admin.php?m=sp">Sản phẩm</a></li>
		<li><a href="admin.php?m=tk">Tài khoản</a></li>
		<li><a href="#">Đơn hàng</a></li>
	</ul>
	<br><br>
	<?php
	if(isset($_GET['m']))
	{
		if($_GET['m']=="sp")
		{
			require_once('connect.php');
			// xử lý pagination
			$item_per_page=!empty($_GET['perpage']) ? $_GET['perpage']:5;
			$current_page=!empty($_GET['page']) ? $_GET['page']:1;
			$offset=($current_page-1)*$item_per_page;
			$sql="SELECT * FROM SANPHAM ORDER BY MaSanPham ASC LIMIT ".$item_per_page." OFFSET ".$offset."";
			$product=mysqli_query($conn,$sql);
			$totalrecord=$conn->query("SELECT * FROM SANPHAM");
			$totalrecord=$totalrecord->num_rows;
			$totalpage=ceil($totalrecord/$item_per_page);
		?>
	<table class="table table-bordered">
		<tr>
			<th>ID</th>
			<th>Category</th>
			<th>Name</th>
			<th>Price</th>
			<th>Image</th>
			<th>Image1</th>
			<th>Image2</th>
			<th>Producer</th>
			<th>Action</th>
		</tr>
		
		<?php
			// show data sản phẩm
				while($data=mysqli_fetch_assoc($product))
				{
					echo "<tr>";
					echo "<td>".$data['MaSanPham']."</td>";
					echo "<td>".$data['MaLoai']."</td>";
					echo "<td>".$data['TenSanPham']."</td>";
					echo "<td>".number_format($data['Gia'])."</td>";
					echo "<td>".$data['HinhAnh']."</td>";
					echo "<td>".$data['HinhCT1']."</td>";
					echo "<td>".$data['HinhCT2']."</td>";
					echo "<td>".$data['HangSanXuat']."</td>";
					echo "<td><a href='#'>Edit</a>	<a href='#'>Delete</a></td>";
					echo "</tr>";
				}
		?>
		
	</table>
	<div class="pagination">
			<?php
					for($current_page=1;$current_page<=$totalpage;$current_page++)
					{
						echo "<a class='popup-link' style='color:black;border:1px solid silver;margin:3px;padding:3px;' href='?m=sp&perpage=".$item_per_page."&page=".$current_page."'>".$current_page."</a>";			
					}
				?>
		</div>
	<?php } 
		if($_GET['m']=="tk")
		{
			?>
			<table class="table table-bordered">
				<tr>
					<th>ID</th>
					<th>UserName</th>
					<th>Password</th>
					<th>Email</th>
					<th>FullName</th>
					<th>DateTime</th>
					<th>Phone</th>
					<th>Location</th>
					<th>Avatar</th>
					<th>Action</th>
				</tr>
			<?php
			require_once "connect.php";
			$result=$conn->query("SELECT * FROM TAIKHOAN");
			if($result->num_rows > 0)
			{
				while($row=$result->fetch_assoc())
				{
					echo "<tr>";
					echo "<td>".$row['id']."</td>";
					echo "<td>".$row['TenDangNhap']."</td>";
					echo "<td>".$row['MatKhau']."</td>";
					echo "<td>".$row['Email']."</td>";
					echo "<td>".$row['HoTen']."</td>";
					echo "<td>".$row['NgaySinh']."</td>";
					echo "<td>".$row['SDT']."</td>";
					echo "<td>".$row['DiaChi']."</td>";
					echo "<td>".$row['AnhDaiDien']."</td>";
					echo "<td><a href='admin.php?m=tk&deleteID=".$row['id']."'>Delete</a></td>";
					echo "</tr>";
				}
			}
			echo "</table>";
			if(isset($_GET['deleteID'])){
				require_once "connect.php";
				$deleteID=$_GET['deleteID'];
				$delete=$conn->query("DELETE FROM TAIKHOAN WHERE id='".$deleteID."'");
				if($delete){
					echo " Xoá thành công !!";
					header("location:?m=tk");
				}

			}
		}
}

	 ?>
</body>
</html>