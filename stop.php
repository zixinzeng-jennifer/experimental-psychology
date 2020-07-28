
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>stop</title>
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
function searchpost()
{
	var gender=getQueryString('gender');
	var age=getQueryString('age');
	var userno=getQueryString('userno');
	var status=getQueryString('status');
	var url="readme2.php?userno="+userno+"&age="+age+"&gender="+gender+"&status="+status;
	window.location.href=url;
}
function get()
{
	var timeout=getQueryString('timeout');
	document.getElementById("out").innerHTML=timeout;
	}
</script>
<body>
<div style="text-align:center; width:auto; font-size:60px;  font-weight:bold;">在上组任务中，您超时的次数为：<div id="out" style="display:inline;"></div>次</div>
<div style="text-align:center;font-size:60px; color:blue;font-weight:bold">请在原地稍作休息。</div>
<br>
<div style="text-align:center; width:auto; font-size:30px;  font-weight:bold;">剩余休息时间：<div id="time"></div></div>
<div style="align-items:center;display:block;text-align:center;padding:20px;font-size:40px;"><input type="button" value="继续实验"   onclick="searchpost()" ></div>
<script>
window.onload = function(){
    var time = {
        init: function() {
            var oTime=document.getElementById("time");
            var ms=60;
            oTime.innerHTML=ms+"s";
            
            //进行倒计时显示
            var time = setInterval(function(){
              if(ms>0)
              {
              	ms=ms-1;
              }
              
              oTime.innerHTML=ms+"s";
          

            }, 1000);
        }
    }
    time.init();
	get();
}
</script>
</body>
</html>