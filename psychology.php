
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>search</title>
<style>
#searchicon{
height:auto;
float:left;
padding: 14px 16px;
width:10%;
margin:5px;
}
#search{
height:auto;
text-align:left;
padding: 16px 14px 16px 60px;
margin:5px;
width:60%;
float:left;
background-repeat:no-repeat;
background-image:url('timg.jpg');
background-size:45px 45px;
}
input[type=button],input[type=reset] {
  background-color: #e7e7e7;
  border: none;
  color: #666;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  font-weight:bold;
}

input[type=button]:hover {
  background-color: #4CAF50;
  color:white;
}
input[type=submit]:hover {
  background-color: #4CAF50;
}
.time{
font-size:30px;
text-align:center;
width:100%;
}
</style>
<script type="text/javascript">
function getQueryString(name) {
	  var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
	  var r = window.location.search.substr(1).match(reg);
	  if (r != null) return unescape(r[2]);
	  return null;
	} 
function searchpost(url)
{
  // var form1 = document.getElementsByName("form1")[0];
  	var form1 = document.form1;
  	var oTime = document.getElementById("time");
  	var gender=getQueryString('gender');
	var age=getQueryString('age');
	var userno=getQueryString('userno');
	var trial=getQueryString('trial');
	var status=getQueryString('status');
	var pass=getQueryString('pass');
	var timeout=getQueryString('timeout');
	var place=url+"&trial="+trial+"&countdown="+oTime.innerHTML+"&userno="+userno+"&age="+age+"&gender="+gender+"&status="+status+"&pass="+pass+"&timeout="+timeout;
	form1.action=place;
	//alert(place);
	   // form1.method = "post";
	form1.submit();
}

</script>
</head>
<body>

<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="psych";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){die("Connection failed: ". mysqli_connect_error());}
mysqli_query($conn,"SET NAMES utf8");


list($msec, $sec) = explode(" ", microtime());
$msectime = (float)sprintf("%.0f", (floatval($msec) + floatval($sec)) * 1000);
echo '<div id="all"><div style="height:40%; width:100%;text-align:center;"><img src="42.jpg"></div>';
echo '<div style="height:auto; position:relative; top:50%; left:10%;"><form method="post" name="form1">
        <input id="search" type="text" name="content" placeholder="输入ISBN" autocomplete="off"> <input type="button" value="确定" onclick="'.'searchpost(\'psyresult.php?starttime='.$msectime.'\')">
        

        </form> </div></div>';
// action="psyresult.php?starttime='.$msectime.'"
mysqli_close($conn);
?>
   
<div id="time" style="text-align:center; width:100%; font-size:30px;  font-weight:bold;"></div>
<script>
window.onload = function(){
    var time = {
        init: function() {
            var oTime=document.getElementById("time");
            var trial=getQueryString('trial');
            if(trial<=6)
            		{var ms=18.00;}
            	else{var ms=Number(getQueryString('pass'));}
            var i=0;
            
            
            //进行倒计时显示
            var time = setInterval(function(){
                
                  ms-=0.01;
                  ms=ms.toFixed(2);
                  i+=1;
              if(ms<0)
              {
                  oTime.style.color="red";
              }
              oTime.innerHTML=ms+"s";
          

            }, 10);
        }
    }
    time.init();

}
</script>
</body>
</html>