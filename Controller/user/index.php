<?php
	if(isset($_GET['a']))
	{
		$action= $_GET['a'];
	}
	else
	{
		$action = '';
	}

	switch ($action) {
		case 'register':{
			if(isset($_POST['add_user']))
			{
				$tdn=$_POST['username'];
				$email=$_POST['email'];
				$matkhau=$_POST['pass'];
				$table="TAIKHOAN";
				$into="TenDangNhap,Email,MatKhau";
				$values="'$tdn','$email','$matkhau'";
				if(!empty($tdn) && !empty($email) && !empty($matkhau))
				{
					$sql="SELECT * FROM TAIKHOAN WHERE TenDangNhap='$tdn' or Email='$email'";
					$check=$db->execute($sql);
					$row=mysqli_num_rows($check);
					if($row > 0)
					{
						echo "<script>alert('Đã tồn tại')</script>";
						
					}
					else
					{
							$db->InsertData($table,$into,$values);
							header("location:index.php?c=user&a=login");
						
					}
				}
				else
				{
					echo "<script>alert('Have not empty')</script>";
				}
			}
			require_once('View/user/add_user.php');
			break;
		}

		case 'login':{
			if(isset($_POST['login']))
			{
				$user=$_POST['username'];
				$pass=$_POST['pass'];
				if(empty($user) || empty($pass))
				{
					echo "Vui lòng không để trống";
				}
				else
				{
					$sql="SELECT * FROM TAIKHOAN WHERE TenDangNhap='".$user."' AND MatKhau='".$pass."'";
					$data = $db->getDataSQL($sql);
					if($data)
					{
						$_SESSION['id']=$data['id'];
						$_SESSION['user']=$user;
						header("location:index.php");
					}
					else
					{
						echo "<script>alert('Đăng nhập thất bại')</script>";
					}
				}
			}

			require_once "View/user/login.php";
			break;
		}
		
		case 'profile':{
			$id=$_SESSION['id'];
			if(isset($_SESSION['user']))
			{				
				$sql="SELECT * FROM TAIKHOAN WHERE id=".$id."";
				$dataID = $db->getDataID($sql);

				if(isset($_POST['update']))
				{
					$email=$_POST['email'];
					$pass=$_POST['pass'];
					$name=$_POST['name'];
					$phone=$_POST['phone'];
					$location=$_POST['location'];
					$dtime=$_POST['dtime'];
					if($db->UpdateData($getid,$email,$pass,$name,$phone,$dtime,$location))
					{
						echo "<script>alert('Cập nhật thành công !')</script>";
						header("Refresh:2");
					}
				}
				if(isset($_POST['cancel'])){header("location:index.php");}
			}
			
			
			require_once('View/user/edit_user.php');
			break;
		}
		

		case 'logout':{
			if(isset($_SESSION['user']))
			{
				session_destroy();
				header("location:index.php");
			}
		}

		case 'delete':{
			
			if(isset($_GET['id']))
			{
				$id=$_GET['id'];
				$db->DeleteData($id);
				header("location:index.php?c=user&a=list");
			}
			break;
		}

		case 'list':{
			if(isset($_SESSION['user']) && $_SESSION['user'] === "admin")
			{
				$table = "TAIKHOAN";
				$data = $db->getAllData($table);
				require_once('View/user/list.php');
				break;
			}
			else
			{
				echo "<span style='color:red;'>You are not admin !</span>";
			}
			
		}

		case 'search':{
			if(isset($_SESSION['user']) && $_SESSION['user'] === "admin")
			{
				if(isset($_GET['key']))
				{
					$key=$_GET['key'];
					$table="TAIKHOAN";
					$data_se=$db->Search($table,"TenDangNhap",$key);
				}

				require_once('View/user/search.php');
				break;
			}
		}
	}

	
?>