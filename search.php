
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include('module/header.php') ?>
</head>
<body style="margin-top: 100px;">
	<?php include('module/menu.php') ?>
	<div class="container dienthoai">
		<div class="row">
			<?php
				if(isset($_POST['searchbox']))
				{
						$keyword=$_POST['textsearch'];
						include ('connectDB.php');
						$sql = "SELECT * FROM SANPHAM WHERE TenSanPham like '%$keyword%'";
						$query = mysqli_query($conn,$sql);
						if(mysqli_num_rows($query)>0)
						{
							while($row=mysqli_fetch_array($query))
							{
			?>
					<div class="col-md-3">
							<a href="productdetail.php?MaSanPham=<?php echo $row['MaSanPham'] ?>" class="gtco-item">
								<div class="fig">
									<div class="overplay">
									</div>	
									<img src="<?php echo $row['HinhAnh'] ?>" width="100%" height="310px">
								</div>
								<div class="gtco-text">
									<h2><?php echo $row['TenSanPham']; ?></h2>
									<p><?php echo $row['Gia']; ?>đ</p>
									<span class="btn btn-info">Xem chi tiết</span>
								</div>
							</a>
					</div>
				</div>
		<?php
						}
					}
			}

		?>
		
	</div>

</body>
</html>

