<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">

    ul{
      list-style-type: none;
      margin: 0;
      padding: 0;
    }
    li{
      text-decoration: none;
    }
    #menu
    {
      position: relative;
    }
    #submenu
    {
      position: absolute;
    }
  </style>
</head>
<body>
      <form>
        
        <ul id="menu">
          <li>
            <input type="text" name="txts" id="txts" onkeyup="showsearch(this.value)">
            <ul id="submenu">
              <li><div id="shows"></div></li>
            </ul>
          </li>
        </ul>
      </form>

      
</body>
</html>
<script>
  function showsearch(str) 
    {
      var sl=document.getElementById("txts").value;
      var xmlhttp;
      if (str.length == 0) {
          document.getElementById("shows").innerHTML = "";
          document.getElementById("shows").style.display="none";
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
                document.getElementById("shows").style.display="block";
            }
        };
        xmlhttp.open("GET","12-15.php?q="+sl,true);
        xmlhttp.send();
    }
}
</script>

