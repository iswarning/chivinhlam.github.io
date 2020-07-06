<?php 
	session_start();
 ?>
 <?php
 	include('./connect.php');
 	if(isset($_SESSION['user'])){
 		$id=$_SESSION['user_id'];
	 	$profile="SELECT * FROM TAIKHOAN WHERE id='".$id."'";
	 	$result2=mysqli_query($conn,$profile);
	 	if(mysqli_num_rows($result2)>0)
	 	{
	 		while($row=mysqli_fetch_assoc($result2))
	 		{
	 			$MaTaiKhoan=$row['id'];
	 			$tdn=$row['TenDangNhap'];
	 			$mk=$row['MatKhau'];
	 			$email=$row['Email'];
	 			$sdt=$row['SDT'];
	 			$hoten=$row['HoTen'];
	 			$dtime=$row['NgaySinh'];
	 			$location=$row['DiaChi'];
	 			$avatar=$row['AnhDaiDien'];
	 		}
	 	}
 	}
 	
 ?>
<nav class="navbar navbar-expand-sm bg-dark fixed-top navbar-dark">
			<button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a  href="index.php" class="navbar-brand"><img src="image/logo4.png" width="200px" height="50px"></a>
			<div class="collapse navbar-collapse" id="nav-content">   
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link active" href="index.php">Home</a>
					</li>
<?php
	$string="SELECT * FROM LOAISANPHAM WHERE parent=0";
	$kethop=mysqli_query($conn,$string);
	if(mysqli_num_rows($kethop)>0)
	{
		while($dong=mysqli_fetch_assoc($kethop))
		{
?>
		<li class="nav-item">
			<a class="nav-link" href="#">
				<?php echo $dong['TenLoai'] ?>
			</a>
		</li>
<?php
		}
	}
?>
					


				<form class="form-inline my-2 my-lg-0 mr-lg-2" method="POST" action="search.php">
					<li class="nav-item" style="width: 200px">						
							<div class="input-group" style="color: red">
								<ul>
									<li style="position: relative;">
										<input id="timkiem" class="form-control" type="text" placeholder="Search for..." name="textsearch" onkeyup="showsearch(this.value)">									
									</li>
										
									<ul style="position: absolute;background-color: white;width:300px;max-width: 500px;">
										<li><div id="shows" style="padding: 6px"></div></li>
									</ul>
								</ul>

							</div>			
					</li>
					<li class="nav-item">
						<span class="input-group-append">
							<button type="submit" name="searchbox" class="btn btn-success"><i class="fa fa-search"></i></button>
						</span>
					</li>
				</form>
					<?php
						if(isset($_SESSION['user']))
						{
					?>
							
							<li class="nav-item">
								<a class="nav-link" href="profile.php?id=<?php echo $id ?>">Profile</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="logout.php">Logout</a>
							</li>
					<?php									
						}
						else
						{
		                    if(!isset($_SESSION['user']))
		                    {
					?>
							
                            <li class="nav-item">
								<a class="nav-link" href="register.php">Sign Up</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="login.php">Login</a>
							</li>
					<?php
							/*if($_SESSION['user']=="admin")
							{
					?>			<li class="nav-item">
									<a class="nav-link" href="admin.php">Admin</a>
								</li>
					<?php
							}*/
		                    }
						}
					?>
					
					<li class="nav-item">
						<a class="nav-link" href="shoppingcart.php"><i class="fa fa-shopping-cart" style="font-size: 15px;"></i></a>
					</li>
					<li class="nav-item" style="padding-left: 0px">
						<span style="width: 5px; height: 5px; border-radius: 1px; background-color: green;color: white;">
							<?php
								if(!isset($_SESSION['shoppingcart']))
								{
									echo "0";
								}
								else
								{
									$coun=count($_SESSION['shoppingcart']);
									echo $coun;
								}
							?>
						</span>
					</li>
				</ul>
			</div>			
		</nav>
<script>
  function showsearch(str) 
    {
      var sl=document.getElementById("timkiem").value;
      var xmlhttp;
      if (str.length == 0) {
          document.getElementById("shows").innerHTML = "";
          return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("shows").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","12-15.php?q="+sl,true);
        xmlhttp.send();
    }
}
</script>

		