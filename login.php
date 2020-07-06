<?php

  ob_start();
  session_start();
  include ('connect.php');
  if(isset($_POST['login']))
  {
      if(!empty($_POST['tk']) && !empty($_POST['mk']))
      {
          $user=$_POST['tk'];
          $pass=$_POST['mk'];
          $sql="SELECT * FROM TAIKHOAN WHERE TenDangNhap='$user' and MatKhau='$pass'";
          $result=mysqli_query($conn,$sql);
          $row=mysqli_fetch_array($result);
          if(mysqli_num_rows($result)>0)
          {
            $_SESSION['valid']=true;
            $_SESSION['timeout']=time();
            $_SESSION['user']=$user;
            $_SESSION['user_id']=$row['id'];
            header("location:index.php");
          }
          else
          {
            echo "<script>alert('Invalid username or password !')</script>";
          }
      }
      else
      {
        echo "<script>alert('Invalid error !')</script>";
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
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="POST" action="login.php">
          <div class="form-group">
            <label for="exampleInputEmail1">Username:</label>
            <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" name="tk">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password:</label>
            <input class="form-control" id="exampleInputPassword1" type="password" name="mk">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
              </div>
            </div>
            <input style="width: 100%;" type="submit" name="login" value="Login">
          </form>
          <div class="text-center">
            <a class="d-block small" href="register.php">Sign Up</a>
          </div>
        </div>
      </div>
    </div>
  </body>
  </html>