
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include('module/header.php') ?>
</head>
<body>
	<?php include('module/menu.php') ?>
	<div style="margin:100px;" class="container">
		<form method="POST" action="edit.php">		
			<label>FullName: </label><br>		
				<input type="text" id="hoten" name="hoten" value="<?php echo $hoten;?>"><br>
			<label>Username: </label><br>	
				<input type="text" id="user" name="user" value="<?php echo $user;?>"><br>
			<label>Password: </label><br>	
				<input type="password" id="pass" name="pass" value="<?php echo $pass;?>"><br>
			<label>Email: </label>	<br>	
				<input type="text" id="email" name="email" value="<?php echo $email;?>"><br>
			<label>DateTime:</label><br>	
				<input type="text" id="dtime" name="dtime" value="<?php echo $dtime;?>"><br>
			<label>Phone: </label>	<br>	
				<input type="number" id="phone" name="phone" value="<?php echo $phone;?>"><br>
			<label>Location: </label> <br>
				<input type="text" id="location" name="location" value="<?php echo $location;?>"><br>
			<input type="submit" name="update" value="Update">
			<button type="canel" onclick="window.location='profile.php';return false;">Cancel</button>
		</form>
	</div>
</body>
</html>