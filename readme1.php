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
	var url = "psychology.php?trial=1&userno="+userno+"&age="+age+"&gender="+gender+"&status="+status+"&pass=0"+"&timeout=0";
	window.location.href=url;
}

</script>
<body>
<div style="text-align:center;align-items:center;"><div style="text-align:left;font-size:30px; font-weight:bold;padding:100px;">&nbsp;&nbsp;&nbsp;&nbsp;想象你是一名图书馆工作人员，你要做的是一项检索图书的工作，而现在是工作最后的截止时间，需要你<span>快速准确</span>地把这项工作做完，<span>系统会记录你的时间，如果超时会扣除你的工资。</span>现在，你手上的A4纸上有30本图书的ISBN(国际标准书号)，你需要利用它们<span>尽快</span>完成图书价格信息的查询任务。<br>&nbsp;&nbsp;&nbsp;&nbsp;一开始，你会进入一个数据库的检索界面，你的任务是在检索栏里输入第一本图书的ISBN，点击“确定”，跳转进入结果页面，该页面将呈现该书的书名、作者、简介、价格等信息。你需要将该书的<span>价格(仅数字部分，例如36.50)</span>输入到页面下方的文本框里，按“提交”键提交。接着，屏幕上会呈现你所用的时间，并提示你是否按时提交。按“继续”键返回至检索界面，按照相同的程序，开始下一本图书的查询，直到把30本图书的价格查询完毕。<br>&nbsp;&nbsp;&nbsp;&nbsp;你将有6次练习的机会以熟悉操作流程。<br>&nbsp;&nbsp;&nbsp;&nbsp;看明白上述话的意思后，点击“开始实验”。</div></div>
<div style="align-items:center;display:block;text-align:center;padding:20px;font-size:40px;"><input type="button" value="开始实验"   onclick="searchpost()" ></div>
				
</body>
</html>