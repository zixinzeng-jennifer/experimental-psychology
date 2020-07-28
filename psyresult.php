<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>result</title>
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
// var form1 = document.getElementsByName("form1")[0];
	var form1 = document.form1;
	var ISBN=getisbn();
	var gender=getQueryString('gender');
	var age=getQueryString('age');
	var userno=getQueryString('userno');
	var trial=getQueryString('trial');
	var status=getQueryString('status');
	var starttime=getQueryString('starttime');
	var pass=getQueryString('pass');
	var timeout=getQueryString('timeout');
	var countdown=String(document.getElementById("count").innerHTML);
	//alert(countdown);
	var place="timer.php?starttime="+starttime+"&ISBN="+ISBN+"&countdown="+countdown+"&trial="+trial+"&userno="+userno+"&age="+age+"&gender="+gender+"&status="+status+"&pass="+pass+"&timeout="+timeout;
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
echo '<script> function gettime(){return '.$msectime.';}</script>';
echo '<script> function getisbn(){return '.$_POST['content'].';}</script>';


$sql="SELECT * FROM book WHERE ISBN='".$_POST['content']."'";
$result=mysqli_query($conn,$sql);
$s="SELECT time FROM trial WHERE tno=".$_GET['trial'];
$times=mysqli_query($conn,$s);
if(mysqli_num_rows($times)==0||$_GET['status']==1)
{
    $t=0;
}
else{
$time=mysqli_fetch_array($times);
$t=$time['time'];}
echo '<script> function getstop(){return '.$t.';}</script>';
if(mysqli_num_rows($result)==0)
{   
    echo '<script language="JavaScript">;alert("输入错误"); history.back();</script>';}
else{
    $row=mysqli_fetch_array($result);
    echo'<div class="image"><img src="'.$row['url'].'"  height="350"></div>';
    if($t)
    {
        echo'<script>body.style.cursor="wait";</script>';
        sleep($t);
        echo'<script>body.style.cursor="auto";</script>';
    }
    echo'<div class="info">';
    echo "《".$row['title'] ."》<br/> " ;

    if(strlen($row['alltranslator']==0))
    {echo "作者:".$row['allauthor']."<br>";}
    else{ echo "作者:".$row['allauthor']. "  译者:".$row['alltranslator'] . "<br>";}
    echo "出版社:".$row['publisher']." "."分类:".$row['classification']."<br>";
 
    echo '</div></div>';
    echo "<div>".$row['Cintroduction']."</div>";

    echo "<div>".$row['Eintroduction']."</div>";
    echo "<br><br>";
    echo "<div class='info'>$".$row['price']."<br></div>";

    echo '<div style="height:auto; position:relative; top:50%; left:10%;"><form method="post" name="form1">
				<input id="search" type="text" name="content" placeholder="输入价钱" autocomplete="off">
                <input type="button" value="提交" onclick="searchpost()">
				</form> </div>';
}

mysqli_close($conn);
?>
<div id="time" style="text-align:center; width:100%; font-size:30px;  font-weight:bold;"></div>
<div id="count" style="display:none;"></div>
<script language="javascript">
var countdown;
function getQueryString(name) {
  var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
  var r = window.location.search.substr(1).match(reg);
  if (r != null) return unescape(r[2]);
  return null;
} 
window.onload = function(){
    var time = {
        init: function() {
            var oTime=document.getElementById("time");
            var counttime=document.getElementById("count");
            var starttime=Number(getQueryString("starttime"));
            var currenttime=gettime();
            var stoptime=getstop();
            var st=Number(stoptime);
            //alert(currenttime);
            var ctime=Number(currenttime);
            var pass=Number(getQueryString("pass"));
            var trial=Number(getQueryString("trial"));
            var total;
            if(trial<=6)
            {total=18;}
            else{total=2+pass;}
            //alert(ctime-starttime);
            var ms=total-((ctime-starttime)/1000)-st;//去掉最后一位
			var countdown=Number(getQueryString("countdown").slice(0,-1));
      
            var i=0;
            oTime.innerHTML=ms+"s";
            
            //进行倒计时显示
            var time = setInterval(function(){
                  ms-=0.01;
                  countdown-=0.01;
                  ms=ms.toFixed(2);
                  countdown=countdown.toFixed(2);
                  i+=1;
              if(ms<0)
              {
                  oTime.style.color="red";
              }
              oTime.innerHTML=ms+"s";
          	  counttime.innerHTML=countdown;
 
            }, 10);
        }
    }
    time.init();

}
</script>
</body>
</html>