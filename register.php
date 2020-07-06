<?php
	$error="";
	if(isset($_POST['submit']))
	{
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$email=$_POST['email'];
		$pass2=$_POST['pass2'];
		if(empty($user) or empty($pass) or empty($email) or empty($pass2))
		{
			$error="Vui lòng điền đầy đủ thông tin";
		}
		else
		{
			include('connect.php');
			$sql="SELECT * FROM TAIKHOAN WHERE TenDangNhap = '$user'";
			$query=mysqli_query($conn,$sql);
			if(mysqli_num_rows($query)>0)
			{
				$error="Username đã tồn tại";
			}
			else
			{
				if($pass2 != $pass)
				{
					$error="Mật khẩu không trùng khớp";
				}
				else
				{
					$sql2="INSERT INTO TAIKHOAN(TenDangNhap,MatKhau,Email) VALUES ('$user','$pass','$email')";
					$result=mysqli_query($conn,$sql2);
					if($result)
					{
						echo "<script>alert('Đăng ký thành công')</script>";
						header("location:login.php");
						
					}
					else
					{
						echo "<script>alert('Đăng ký thất bại')</script>";
					}
				}
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Trang đăng nhập</title>
	<meta charset="utf-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" type="text/css" href="css/chitiet.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- jQuery library -->
  <script src="js/jquery-3.3.1.min.js"></script>

  <!-- Popper JS -->
  <script src="js/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" src="js/chitiet.js"></script>
  <style type="text/css">
  .container
  {
    width: 30%;
  }
</style>
</head>
<body class="bg-dark">
  <?php include('module/menu.php') ?>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header" style="color: black;text-align: center;font-size: 20px;">
	      Sign Up
	  </div>
      <div class="card-body">
        <form method="POST" action="register.php">
          <div class="form-group">
            <label for="username">Username:</label>
            <input class="form-control" id="username" type="text" name="user">
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" id="email"  type="text" name="email">
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input class="form-control" id="password"  type="password" name="pass">
          </div>
          <div class="form-group">
            <label for="password2">Re-Password:</label>
            <input class="form-control" id="password2"  type="password" name="pass2">
          </div>
        	<input style="width: 100%;" type="submit" name="submit" value="Đăng ký">
        	<span style="color: red;"><?php echo $error; ?></span>
          </form>
        </div>
      </div>
    </div>
  </body>
  </html>