<nav class="navbar navbar-expand-sm bg-dark fixed-top navbar-dark">
      <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a  href="index.php" class="navbar-brand"><img src="image/logo4.png" width="200px" height="50px"></a>
      <div class="collapse navbar-collapse" id="nav-content">   
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?c=product&a=cate&id=1">Điện thoại</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?c=product&a=cate&id=2">Phụ kiện</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?c=product&a=cate&id=3">Tablet</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?c=product&a=cate&id=4">Laptop</a>
          </li>

          


        <form class="form-inline my-2 my-lg-0 mr-lg-2" method="POST" action="index.php?c=product&a=search">
          <li class="nav-item" style="width: 200px">            
              <div class="input-group" style="color: red">
                <ul>
                  <li style="position: relative;">
                    <input id="timkiem" class="form-control" type="text" placeholder="Search for..." name="textsearch" onkeyup="showsearch(this.value)">                  
                  </li>
                    
                  <ul style="position: absolute;background-color: white;width:300px;max-width: 500px;">
                    <li><div id="shows" style="padding: 6px"></div></li>
                  </ul>
                </ul>

              </div>      
          </li>
          <li class="nav-item">
            <span class="input-group-append">
              <button type="submit" name="searchbox" class="btn btn-success"><i class="fa fa-search"></i></button>
            </span>
          </li>
        </form>
          <?php
            if(!isset($_SESSION['user']))
            {
              
          ?>
              <li class="nav-item">
                <a class="nav-link" href="index.php?c=user&a=register">Đăng ký</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?c=user&a=login">Đăng nhập</a>
              </li>
          <?php                 
            }
            else
            {
                $ids=$_SESSION['id'];
          ?>

              <li class="nav-item">
                <a class="nav-link" href="index.php?c=user&a=profile&id=<?php echo $ids; ?>">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?c=user&a=logout">Logout</a>
              </li>

          <?php
              if($_SESSION['user'] === "admin")
              {
          ?>      <li class="nav-item">
                  <a class="nav-link" href="index.php?c=user&a=list">Admin</a>
                </li>
          <?php
              }
            }
          ?>
          
          <li class="nav-item">
            <a class="nav-link" href="index.php?c=cart&a=listCart"><i class="fa fa-shopping-cart" style="font-size: 15px;"></i></a>
          </li>
          <li class="nav-item" style="padding-left: 0px">
            <span style="width: 5px; height: 5px; border-radius: 1px; background-color: green;color: white;">
              <?php
                if(!empty($_SESSION['cart']))
                {
                  echo count($_SESSION['cart']);
                }
                else
                {
                  echo 0;
                }
              ?>
            </span>
          </li>
        </ul>
      </div>      
    </nav>
<script>
  function showsearch(str) 
    {
      var sl=document.getElementById("timkiem").value;
      var xmlhttp;
      if (str.length == 0) {
          document.getElementById("shows").innerHTML = "";
          return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("shows").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","index.php?c=product&a=livesearch&q="+sl,true);
        xmlhttp.send();
    }
}
</script>