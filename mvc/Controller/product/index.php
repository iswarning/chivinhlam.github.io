<?php
	if(isset($_GET['a']))
	{
		$action=$_GET['a'];
	}
	else
		$action="";

	switch ($action) {
		case 'home':{
			$sql="SELECT * FROM SANPHAM";
			$data=$db->getDataSQL($sql);
			require_once('View/product/home.php');
			break;				
			
		}
		case 'detail':{
			$id=$_GET['id'];
			$sql="SELECT * FROM SANPHAM WHERE MaSanPham=".$id."";
			$datap=$db->getDataID($sql);
			require_once('View/product/detail.php');
			break;
		}
		case 'search':{
			if(isset($_POST['searchbox'])){
				$table="SANPHAM";
				$name="TenSanPham";
				$key=$_POST['textsearch'];
				$ssp=$db->Search($table,$name,$key);
			}
			
			require_once('View/product/search.php');
			break;
		}
		case 'livesearch':{
			$q=$_REQUEST['q'];
			$sql="SELECT * FROM SANPHAM WHERE TenSanPham like '%".$q."%' or Gia like '%".$q."%'";
			$data=$db->getDataSQL($sql);
			require_once "View/product/livesearch.php";
			break;
		}
		case 'cate':{
			require_once "View/product/category.php";
			break;
		}
	}
		
?>