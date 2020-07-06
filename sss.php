
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include('module/header.php') ?>
</head>
<body>
	<script>
		$(document).ready(function(){
			$('#menhgia').on('change',function(){
				var value=$(this).val();
				$.ajax({
					url:'tags.php',
					type:'POST',
					data:'request='+value,
					beforeSend:function(){
						$('#showdata').html('Loading....');
					},
					success:function(data){
						$('#showdata').html(data);
					},
				});
			},
			$('#sapxep').on('change',function(){
				var value1=$(this).val();
				$.ajax({
					url:'tags.php',
					type:'POST',
					data:'request='+value1,
					beforeSend:function(){
						$('#showdata').html('Loading....');
					},
					success:function(data){
						$('#showdata').html(data);
					},
				});
			})
			);
		});
	</script>
	<select name="menhgia" id="menhgia" >
		<option value="0">Mệnh giá</option>
		<option value="1">1tr--5tr</option>
		<option value="2">5tr--10tr</option>
		<option value="3">10tr trở lên</option>
	</select>
	<select name="sapxep" id="sapxep" >
		<option value="0">Sắp xếp</option>
		<option value="4">Tăng dần</option>
		<option value="5">Giảm dần</option>
	</select>	
		<div id="showdata">
			
		</div>
</body>
</html>