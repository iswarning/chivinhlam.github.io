<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	  <style type="text/css"> .danhsach{width: 90%;margin:auto;margin-top:50px;text-align: center;} </style>
</head>
<body>
	<form method="GET">
		<input type="hidden" name="controller" value="user">
		<input type="text" name="key">
		<input type="submit" name="search" value="Go">		
		<input type="hidden" name="action" value="search">
	</form>
	<div class="danhsach table-responsive-sm">
		<table class="table table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Price</th>
					<th>Image</th>
					<th>Image1</th>
					<th>Image2</th>
					<th>Producer</th>
				</tr>
			</thead>
			<tbody>		
					<?php 
						foreach($datap as $values)
						{
							echo "<tr>";
							echo "<td>".$values['MaSanPham']."</td>";
							echo "<td>".$values['TenSanPham']."</td>";
							echo "<td>".number_format($values['Gia'])."</td>";
							echo "<td>".$values['HinhAnh']."</td>";
							echo "<td>".$values['HinhCT1']."</td>";
							echo "<td>".$values['HinhCT2']."</td>";
							echo "<td>".$values['HangSanXuat']."</td>";
							echo "</tr>";
						} 
					?>
			</tbody>
		</table>
	</div>
</body>
</html>

