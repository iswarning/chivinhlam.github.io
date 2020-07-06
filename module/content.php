
<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div id="demo" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<a  href="#"><img class="img-fluid" src="image/slideshow1.png" alt="slideshow1" ></a>
							</div>
							<div class="carousel-item">
								<a  href="#"><img class="img-fluid" src="image/slideshow2.png" alt="slideshow2" ></a>
							</div>
							<div class="carousel-item">
								<a  href="#"><img class="img-fluid" src="image/slideshow3.png" alt="slideshow3" ></a>
							</div>
							<div class="carousel-item">
								<a  href="#"><img class="img-fluid" src="image/slideshow4.png" alt="slideshow4" ></a>
							</div>
							<div class="carousel-item">
								<a  href="#"><img class="img-fluid" src="image/slideshow5.png" alt="slideshow5" ></a>
							</div>
							<div class="carousel-item">
								<a  href="#"><img class="img-fluid" src="image/slideshow6.png" alt="slideshow6" ></a>
							</div>
							<a class="carousel-control-prev" href="#demo" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#demo" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>
						</div>
					</div>
				</div>
				<div class="col-md-4" >
					<h4><a href="trangtintuc.html">TIN CÔNG NGHỆ </a> </h4>
					<div class="media">
						<a href="trangtintuc.html" style="font-size: 14px;"><img class="img-responsive" class="mr-3" src="image/tt1.png">
							<div class="media-body">
								<p>Smartphone Android One mới của Nokia xuất hiện,thiết kế giống Lumia.</p>
							</div>
						</a>
					</div>
					<a href="trangtintuc.html"><img class="img-fluid" src="image/tt2.png" style="margin-top: 10px"></a>
					
					<a href="trangtintuc.html"><img class="img-fluid" src="image/tt3.png"></a>
				</div>
			</div>
		</div>
		<?php
			require_once "connect.php";
			$item_per_page=!empty($_GET['perpage']) ? $_GET['perpage']:4;
			$current_page=!empty($_GET['page']) ? $_GET['page']:1;
			$offset=($current_page - 1) * $item_per_page;
			$product=mysqli_query($conn,"
				SELECT * FROM SANPHAM ORDER BY MaSanPham ASC LIMIT ".$item_per_page." OFFSET ".$offset."");
			$totalrecord=mysqli_query($conn,"SELECT * FROM SANPHAM");
			$totalrecord=$totalrecord->num_rows;
			$totalpage=ceil($totalrecord / $item_per_page);
		?>
<div  class="container dienthoai">
		<div class="row">
			<div class="col-md-12">
				<h4>SẢN PHẨM BÁN CHẠY</h4>
			</div>
		</div>
		<div class="row">
			<?php 
				require_once "connect.php";
				$sql = "SELECT * FROM SANPHAM";
				$result = mysqli_query($conn,$sql);
				if(mysqli_num_rows($result) > 0 )
				{
					while($row = mysqli_fetch_assoc($product))
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
							<p><?php echo number_format($row['Gia']) ?>đ</p>
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
		<style type="text/css">
			a.popup-link:focus{
				background-color: blue;
			}
		</style>
			<div id="pagination">
				<?php
					for($current_page=1;$current_page<=$totalpage;$current_page++)
					{
						echo "<a class='popup-link' style='color:black;border:1px solid silver;margin:3px;padding:3px;' href='?perpage=".$item_per_page."&page=".$current_page."'>".$current_page."</a>";			
					}
				?>
			</div>
	</div>