<?php
	if(isset($_GET['a'])){
		$action=$_GET['a'];
	}
	else{
		$action='';
	}

	switch ($action) {
		case 'listProduct':{
			$table="SANPHAM";
			$data=$db->getAllData($table);
			require_once "View/cart/listProduct.php";
			break;
		}
		case 'addtocart':{
			$table="SANPHAM";
			$data=$db->getAllData($table);
			$idproduct=$_GET['id'];
			$newproduct=array();
			foreach($data as $values){
				$newproduct[$values['MaSanPham']] = $values;	
			}
			if(isset($_GET['id'])){
				
				if(!isset($_SESSION['cart']) || $_SESSION['cart']==null){
					$newproduct[$idproduct]['qty']=1;
					$_SESSION['cart'][$idproduct]=$newproduct[$idproduct];
				}
				else{
					if(array_key_exists($idproduct, $_SESSION['cart'])){
						$_SESSION['cart'][$idproduct]['qty']+=1;
					}
					else{
						$newproduct[$idproduct]['qty']=1;
						$_SESSION['cart'][$idproduct]=$newproduct[$idproduct];
					}
				}
			}
			header("location:index.php?c=cart&a=listCart");
			break;
		}
		case 'listCart':{

			require_once "View/cart/listCart.php";
			break;
		}
		case 'delete':{
			if(isset($_GET['id'])){
				$idproduct=$_GET['id'];
			}
			unset($_SESSION['cart'][$idproduct]);
			header("location:index.php?c=cart&a=listCart");
		}
		case 'update':{
			if(isset($_POST['update'])){
				foreach($_POST['qty'] as $key => $val){
					if($val <= 0){
						unset($_SESSION['cart'][$key]);
					}
					else
						$_SESSION['cart'][$key]['qty']=$val;
				}
			}
			header("location:index.php?c=cart&a=listCart");
			break;
		}
	}
?>