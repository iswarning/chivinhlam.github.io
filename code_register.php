<?php
include ('connectDB.php');
	$hoten=$tdn=$sdt=$email=$location=$matkhau=$nhaplaimatkhau="";
	$error1=$error2=$error3=$error4=$error5=$error6="";
	/*$target_dir="image/";
	$target_file=$target_dir . basename($_FILES['upload']['name']);
	$upload_ok=1;
	$image_file_type=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$check=getimagesize($_FILES['upload']['name']);
	if($check!=false)
	{
		echo "File is an image -".$check['mime'].".";
		$upload_ok=1;
	}
	else
	{
		echo $e_image="File is not an image";
		$upload_ok=0;
	}*/


	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		// xử lý uploadfile
		
		// check họ tên
		if(empty($_POST['hoten']))
		{
			$error1="Không được để trống";
			$check1=false;
		}
		else
		{
			$hoten=test_input($_POST['hoten']);
			if(!preg_match("/^[a-zA-Z]*$/", $hoten))
			{
				$error1="Invalid error";
				$check1=false;
			}
			else
			{
				$check1=true;
			}
		}
		// check tên đăng nhập
		if(empty($_POST['tdn']))
		{
			$error2="Không được để trống";
			$check2=false;
		}
		else
		{
			$tdn=test_input($_POST['tdn']);
			if(!preg_match("/^[a-zA-Z0-9]*$/", $tdn))
			{
				$error2="Invalid error";
				$check2=false;
			}
			else
			{
				$check2=true;
			}
		}
		// check số điện thoại
		if(empty($_POST['sdt']))
		{
			$error3="Không được để trống";
			$check3=false;
		}
		else
		{
			$sdt=test_input($_POST['sdt']);
			if(!preg_match("/^[0-9]*$/", $sdt))
			{
				$error3="Invalid error";
				$check3=false;
			}
			else
			{
				$check3=true;
			}
		}
		// check email
		if(empty($_POST['email']))
		{
			$error4="Không được để trống";
			$chec4=false;
		}
		else
		{
			$email=test_input($_POST['email']);
			if(!filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				$error4="Invalid error";
				$check4=false;
			}
			else
			{
				$check4=true;
			}
		}
		// check mật khẩu
		if(empty($_POST['matkhau']))
		{
			$error5="Không được để trống";
			$check5=false;
		}
		else
		{
			$matkhau=test_input($_POST['matkhau']);
			if(!preg_match("/^[a-zA-Z\d]*$/", $matkhau))
			{
				$error5="Invalid error";
				$check5=false;
			}
			else
			{
				$check5=true;
			}
		}
		// check repassword
		if(empty($_POST['nhaplaimatkhau']))
		{
			$error6="Không được để trống";
			$check6=false;
		}
		else
		{
			$nhaplaimatkhau=test_input($_POST['nhaplaimatkhau']);
			if($nhaplaimatkhau!=$matkhau)
			{
				$error6="Invalid error";
				$check6=false;
			}
			else
			{
				$check6=true;
			}
		}
		
		$sql="INSERT INTO TAIKHOAN(TenDangNhap,MatKhau,Email,HoTen,SDT) VALUES (
		'$tdn','$matkhau','$email','$hoten','$sdt')";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0)
		{
			echo "<script>alert('Đăng ký thành công')</script>";
		}

		//if($check1 && $check2 && $check3 && $check4 && $check5 && $check6 == true)
		//{
			
		//}
		//else
		//{
		//	echo "<script>alert('Đăng ký thất bại')</script>";
		//}

	}

	function test_input($data)
	{
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
?>