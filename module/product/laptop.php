<div class="container dienthoai">
		<div class="row">
			<?php 
				include ('connectDB.php');
				$sql = "SELECT * FROM SANPHAM WHERE MaLoai=4";
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
			 ?>
		</div>
	</div> 