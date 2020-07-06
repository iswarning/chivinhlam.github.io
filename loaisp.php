
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include('module/header.php');?>
</head>
<body>
	<?php include('module/menu.php');?>
<div class="container dienthoai" style="margin-top: 100px;">
		<div class="row">
			<div class="col-md-12">
				<h4>SẢN PHẨM BÁN CHẠY</h4>
			</div>
		</div>
		<div class="row">
			<?php 
				$conn=mysqli_connect('localhost','root','','qlda');
				if(isset($_POST['id']))
				{
					$id=$_GET['id'];
					$sql = "SELECT * FROM SANPHAM WHERE MaLoai='".$id."'";
					$result = mysqli_query($conn,$sql);
					if(mysqli_num_rows($result) > 0 )
					{
						while($row = mysqli_fetch_assoc($result))
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
									<h2><?php echo $row['TenSanPham'] ?></h2>
									<p><?php echo $row['Gia'] ?>đ</p>
									<span class="btn btn-info">Xem chi tiết</span>
								</div>
							</a>
					</div>
					<?php 
							}
						}
						else
						{
							echo "0 results";
						}
						mysqli_close($conn);
					}
				 ?>

				
		</div>
	</div>
</body>
</html>
