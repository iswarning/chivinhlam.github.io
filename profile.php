<?php
	ob_start();
	session_start();
	if(isset($_GET['id']))
	{
		if(isset($_SESSION['user_id']))
		{
			include ('connect.php');
			$id=$_SESSION['user_id'];
			$user=$hoten=$pass=$email=$dtime=$phone=$location=$image="";
			$sql="SELECT * FROM TAIKHOAN WHERE id='$id'";
			$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)>0)
			{
				while($row=mysqli_fetch_array($result))
				{
					$id=$row['id'];
					$hoten=$row['HoTen'];
					$user=$row['TenDangNhap'];
					$pass=$row['MatKhau'];
					$email=$row['Email'];
					$dtime=$row['NgaySinh'];
					$phone=$row['SDT'];
					$location=$row['DiaChi'];
					$image=$row['AnhDaiDien'];
				}
			}
		}
		else
		{
			echo "<script>alert('Bạn chưa đăng nhập !')</script>";
			header("location:login.php");
		}
		
	}
	
	
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include('module/header.php') ?>
</head>
<body>
	<?php include('module/menu.php') ?>
	<div style="margin:100px;" class="container">
		<form method="POST" enctype="multipart/form-data">
			<?php 
				if($image != "")
					{
						?>
							<img src="<?php echo $image; ?>" width="150px" height="200px"><br>
						<?php
					}
				else
				{
					?>
						<label>Hiện tại bạn chưa có ảnh đại diện !</label><br>
						<input type="file" name="upload" value="Choose">
						<br>
					<?php
				}
				
			?>
			<?php
				if(isset($_POST['update']))
					{
						if($_FILES['upload']['error']>0)
						{
							echo "error!";
						}
						else
						{
							$GETimage=$_FILES['upload']['name'];
							$GEThoten=$_POST['hoten'];
							$GETdtime=$_POST['dtime'];
							$GETphone=$_POST['phone'];
							$GETlocation=$_POST['location'];
							move_uploaded_file($_FILES['upload']['tmp_name'],'image/'.$GETimage);
							$upload="
							UPDATE TAIKHOAN 
							SET AnhDaiDien='image/$GETimage',
								HoTen='$GEThoten',
								NgaySinh='$GETdtime',
								SDT='$GETphone',
								DiaChi='$GETlocation'
							WHERE MaTaiKhoan='$id'";
							if($conn->query($upload)===true)
							{
								
								
								echo "<br>Cập nhật thông tin thành công!";
								header("Refresh:2");
							}
							else
							{
								echo "Cập nhật không thành công !";
							}

						}
					}
			?>
			<label>FullName: </label><br>		
				<input type="text" id="hoten" name="hoten" value="<?php echo $hoten;?>"><br>
			<label>Username: </label><br>	
				<input type="text" id="user" name="user" value="<?php echo $user;?>" readonly><br>
			<label>Password: </label><br>	
				<input type="password" id="pass" name="pass" value="<?php echo $pass;?>" readonly><br>
			<label>Email: </label>	<br>	
				<input type="text" id="email" name="email" value="<?php echo $email;?>" readonly><br>
			<label>DateTime:</label><br>	
				<input type="text" id="dtime" name="dtime" value="<?php echo $dtime;?>"><br>
			<label>Phone: </label>	<br>	
				<input type="number" id="phone" name="phone" value="<?php echo $phone;?>"><br>
			<label>Location: </label> <br>
				<input type="text" id="location" name="location" value="<?php echo $location;?>"><br><br>
			<input type="submit" name="update" value="Update">
		</form>
	</div>
</body>
</html>