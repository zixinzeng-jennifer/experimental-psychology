<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>readme1</title>
<style>
input[type=button],input[type=reset] {
  background-color: #e7e7e7;
  border: none;
  color: #666;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  width:50%;
  font-weight:bold;
  font-size:40px;
}

input[type=button]:hover {
  background-color: #4CAF50;
  color:white;
}
span{
color:red;}
</style>
<script>
function getQueryString(name) {
	  var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
	  var r = window.location.search.substr(1).match(reg);
	  if (r != null) return unescape(r[2]);
	  return null;
	} 
function searchpost(){
	var gender=getQueryString('gender');
	var age=getQueryString('age');
	var userno=getQueryString('userno');
	var status=getQueryString('status');
	var url = "adjust.php?trial=1&userno="+userno+"&age="+age+"&gender="+gender+"&status="+status;
	window.location.href=url;
}

</script>
<body>
<div style="text-align:center;align-items:center;"><div style="text-align:left;font-size:30px; font-weight:bold;padding:100px;">&nbsp;&nbsp;&nbsp;&nbsp;应老板要求，进行一项排版任务，其中之一是调节线段长度，每次调整也会限制时间，<span>请尽快完成</span>。屏幕上会呈现两条线段，一条标准线段，长度不变，另一条是调节线段，比标准线段长或短一些。请按照屏幕上方的说明按钮或按键，调整调节线段的长度，至它与标准线段一样长。按“A”可使线段变短，按“L”可使线段变长，调好后请点击“确认”，进入下一次调节。一共进行40次。
看明白上述话的意思后，点击“继续实验”开始实验。

<div style="align-items:center;display:block;text-align:center;padding:20px;font-size:40px;"><input type="button" value="继续实验"   onclick="searchpost()" ></div>
				
</body>
</html>