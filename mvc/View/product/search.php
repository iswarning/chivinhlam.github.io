<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php  include('header.php');?>
  <style type="text/css">
    ul{
      width: 200px;
      height: 200px;
      border: 1px solid silver;
      float: left;
    }
    a{
      color: black;
      text-align: center;
      padding: 5px;
    }
    div{
      margin: 50px;
    }

    img{
      text-align: center;
    }

  </style>
</head>
<body>
  <div>
  <?php
    foreach($ssp as $val)
    {
        echo "<ul>";
        echo "<a href='index.php?c=product&a=detail&id=".$val['MaSanPham']."'>";
        echo "<li><img src='".$val['HinhAnh']."' width='100px' height='120px'></li>";
        echo "<li>".$val['TenSanPham']."</li>";
        echo "<li>".number_format($val['Gia'])."</li>";
        echo "</a>";
        echo "</ul>";
    }
  ?>
</div>
  
</body>
</html>