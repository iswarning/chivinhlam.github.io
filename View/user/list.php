<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	  <style type="text/css">
	   .danhsach{width: 90%;margin:auto;margin-top:20px;text-align: center;} 
	   h3.caption{color: #007bff;text-align: center;margin-top: 20px;}
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
		<table class="table table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>ID</th>
					<th>UserName</th>
					<th>Email</th>
					<th>Password</th>
					<th>FullName</th>
					<th>DateTime</th>
					<th>Phone</th>
					<th>Position</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>		
					<?php 
						foreach($data as $values)
						{
							echo "<tr>";
							echo "<td>".$values['id']."</td>";
							echo "<td>".$values['TenDangNhap']."</td>";
							echo "<td>".$values['Email']."</td>";
							$co=strlen($values['MatKhau']);
							echo "<td>";
							for($i=1;$i<=$co;$i++)
							{
								echo "*";
							}
							echo "</td>";
							
							echo "<td>".$values['HoTen']."</td>";
							echo "<td>".$values['NgaySinh']."</td>";
							echo "<td>".$values['SDT']."</td>";
							echo "<td>".$values['DiaChi']."</td>";
							echo "<td>";
							echo "<a href='index.php?c=user&a=edit&id=".$values['id']."'>Edit </a>";
							echo "<a href='index.php?c=user&a=delete&id=".$values['id']."'>Delete</a>";
							echo "</td>";
							echo "</tr>";
						} 
					?>
			</tbody>
		</table>
	</div>
</body>
</html>

