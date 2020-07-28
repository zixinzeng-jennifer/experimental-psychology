<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>time</title>
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
.image{
width:100%;
text-align:center;
height:auto;
}
.info{

font-weight:bold;
font-size:30px;
text-align:center;
}
</style>
<script>
function getQueryString(name) {
	  var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
	  var r = window.location.search.substr(1).match(reg);
	  if (r != null) return unescape(r[2]);
	  return null;
	} 
function searchpost()
{
//var form1 = document.getElementsByName("form1")[0];
	
	var gender=getQueryString('gender');
	var age=getQueryString('age');
	var userno=getQueryString('userno');
	var trial=Number(getQueryString('trial'))
	var status=getQueryString('status');
	var pass=Number(getQueryString('pass'));
	var timeout=Number(getQueryString('timeout'));
	if(trial>=4&&trial<=6){var t=get();
		pass+=t/1000;}
	if(trial==6){pass/=3; pass+=2; pass=pass.toFixed(2);}
	if(trial>6){var t=get()/1000-Number(getQueryString('pass'));
	if (t>0){timeout+=1;}}
	if(trial<30){ trial+=1;
				var url="psychology.php?trial="+trial+"&userno="+userno+"&age="+age+"&gender="+gender+"&status="+status+"&pass="+pass+"&timeout="+timeout;
				window.location.href=url;
		}
	else{
		
		var url="stop.php?userno="+userno+"&age="+age+"&gender="+gender+"&status="+status+"&timeout="+timeout;
		window.location.href=url;
		}
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
list($msec, $sec) = explode(" ", microtime());
$msectime = (float)sprintf("%.0f", (floatval($msec) + floatval($sec)) * 1000);

$query=explode("&",$_SERVER['QUERY_STRING']);
$starttime = (float)substr($query[0], 1+strpos($query[0], '='));
$totaltime = $msectime-$starttime;
if(!$conn){die("Connection failed: ". mysqli_connect_error());}
mysqli_query($conn,"SET NAMES utf8");

if($_GET['trial']<=6)  
{
    $limit=18000;
}
else{
    $limit=$_GET['pass']*1000;
}

$sql="SELECT * FROM book WHERE ISBN='".$_GET['ISBN']."'AND price='".$_POST['content']."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==0)
{echo '<script language="JavaScript">;alert("输入错误");history.back();</script>';}
else{

if($totaltime>$limit)
{
    $color="red";
}
else{
    $color="green";
}
echo '<br><br><br><br><br><br><br><br>';
echo '<div style="color:'.$color.'; text-align:center; font-size:50px; font-weight:bold; ">';
if($totaltime>$limit)
{
    echo '提交超时！';
}
else{echo '按时提交！';}
echo "时间：";
echo $totaltime.'ms';
if ($_GET['trial']==6) echo'<br>练习试次结束，即将进入正式实验！';
echo '</div>';


}

echo '<script> function get(){return "'.($totaltime).'";}</script>';
$sql="INSERT INTO search VALUES('".$_GET['userno']."','".$_GET['gender']."','".$_GET['age']."','".$totaltime."',".$_GET['trial'].",".$_GET['status'].")";
mysqli_query($conn,$sql);
mysqli_close($conn);
?>

    <input type="button" value="继续" style="text-align:center;align-items:center;position:relative; left:50%; height:50px;width:auto; font-size:30px;" onclick="searchpost()">

</body>
</html>