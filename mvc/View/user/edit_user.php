<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
form{
  width: 400px;
  margin-left: 34%;
  margin-top:7%;
}
</style>
</head>
<body>
  <h3 class="caption">Quản Lý Tài Khoản</h3>
  <div class="danhsach">
    <form method="GET">
      <input type="hidden" name="c" value="user">
      <input type="text" name="key">
      <input type="submit" name="search" value="Tìm">   
      <input type="hidden" name="a" value="search">
    </form>
    </br>
  <form method="POST"> 
  <div class="container">
    <h1>Information Users</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label><b>ID</b></label>
    <span><?php echo $dataID['id']; ?></span>

    <label><b>UserName</b></label>
    <span><?php echo $dataID['TenDangNhap']; ?></span>

    <label><b>Email</b></label>
    <input type="text" name="email" value="<?php echo $dataID['Email'] ?>">

    <label><b>Password</b></label>
    <input type="password" name="pass" value="<?php echo $dataID['MatKhau'] ?>">

    <label><b>FullName</b></label>
    <input type="text" name="name" value="<?php echo $dataID['HoTen'] ?>">

    <label><b>Datetime</b></label>
    <input type="text" name="dtime" value="<?php echo $dataID['NgaySinh'] ?>">
      
    <label><b>Phone</b></label>
    <input type="number" name="phone" value="<?php echo $dataID['SDT'] ?>">

    <label><b>Location</b></label>
    <input type="text" name="location" value="<?php echo $dataID['DiaChi'] ?>">

    <button type="submit" name="update" class="registerbtn">Update</button>
    <button type="submit" name="cancel" class="registerbtn">Cancel</button>

</form>
  </div>
</body>
</html>

