
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>adjust</title>
<style>
.searchicon{
height:auto;
float:left;
padding: 14px 16px;
width:10%;
margin:5px;
}
.search{
height:auto;
text-align:left;
padding: 16px 14px 16px 60px;
margin:5px;
width:60%;
float:left;

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
	var leftlength=new Array();
	leftlength[0]="320";
	leftlength[1]="320";
	leftlength[2]="320";
	leftlength[3]="320";
	leftlength[4]="320";
	leftlength[5]="320";
	leftlength[6]="320";
	leftlength[7]="320";
	leftlength[8]="320";
	leftlength[9]="320";
	
	leftlength[10]="390";
	leftlength[11]="412";
	leftlength[12]="378";
	leftlength[13]="364";
	leftlength[14]="404";
	leftlength[15]="256";
	leftlength[16]="270";
	leftlength[17]="264";
	leftlength[18]="284";
	leftlength[19]="222";

	leftlength[20]="256";
	leftlength[21]="226";
	leftlength[22]="298";
	leftlength[23]="272";
	leftlength[24]="236";
	leftlength[25]="358";
	leftlength[26]="386";
	leftlength[27]="354";
	leftlength[28]="356";
	leftlength[29]="404";

	leftlength[30]="320";
	leftlength[31]="320";
	leftlength[32]="320";
	leftlength[33]="320";
	leftlength[34]="320";
	leftlength[35]="320";
	leftlength[36]="320";
	leftlength[37]="320";
	leftlength[38]="320";
	leftlength[39]="320";
	
	var rightlength=new Array();
	rightlength[0]="232";
	rightlength[1]="268";
	rightlength[2]="234";
	rightlength[3]="234";
	rightlength[4]="272";
	rightlength[5]="346";
	rightlength[6]="372";
	rightlength[7]="384";
	rightlength[8]="372";
	rightlength[9]="418";
	
	rightlength[10]="320";
	rightlength[11]="320";
	rightlength[12]="320";
	rightlength[13]="320";
	rightlength[14]="320";
	rightlength[15]="320";
	rightlength[16]="320";
	rightlength[17]="320";
	rightlength[18]="320";
	rightlength[19]="320";

	rightlength[20]="320";
	rightlength[21]="320";
	rightlength[22]="320";
	rightlength[23]="320";
	rightlength[24]="320";
	rightlength[25]="320";
	rightlength[26]="320";
	rightlength[27]="320";
	rightlength[28]="320";
	rightlength[29]="320";

	rightlength[30]="340";
	rightlength[31]="360";
	rightlength[32]="402";
	rightlength[33]="360";
	rightlength[34]="396";
	rightlength[35]="244";
	rightlength[36]="284";
	rightlength[37]="222";
	rightlength[38]="234";
	rightlength[39]="252";
	
window.onload = function(){
	
	setup();
	
	    var time = {
	        init: function() {
	            var oTime=document.getElementById("time");
	            
	            
	            var ms=10;
	            	
	            var i=0;
	            oTime.innerHTML=ms+"s";
	            
	            //进行倒计时显示
	            var time = setInterval(function(){
	                
	                  if(ms>0)ms-=1;
	                  //ms=ms.toFixed(0);
	                  i+=1;
	              
	                  if(ms<=3)oTime.style.color="red";
	              
	              	oTime.innerHTML=ms+"s";
	          

	            }, 1000);
	        }
	    }
	    time.init();

	
	
}
function searchpost(url)
{
  // var form1 = document.getElementsByName("form1")[0];
  var form1 = document.form1;
  
  form1.action = "";
  // form1.method = "";
  form1.submit();
}
function getQueryString(name) {
	  var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
	  var r = window.location.search.substr(1).match(reg);
	  if (r != null) return unescape(r[2]);
	  return null;
	} 
function setup(){
	//alert("开始初始化");
	var t=Number(getQueryString("trial"));
	//alert(t);
	
	document.getElementById("leftp").style.width=leftlength[t-1]+"px";
	document.getElementById("rightp").style.width=rightlength[t-1]+"px";
	if((t>=1&&t<=10)||(t>=31&&t<=40))
		{document.getElementById("lefti").innerHTML="标准线段";
		 document.getElementById("righti").innerHTML="调节线段";
		}
	else{
		document.getElementById("lefti").innerHTML="调节线段";
		document.getElementById("righti").innerHTML="标准线段";
		}
}

function adj() {
	var e = event;
	//alert(e.keyCode);
	var t=Number(getQueryString("trial"));
	if(e.keyCode==65){//A变短
		if((t>=1&&t<=10)||(t>=31&&t<=40))
		{
			var w= document.getElementById("rightp");
			var s=Number(w.style.width.slice(0,-2));
			s-=2;
			w.style.width=String(s)+"px";
			//alert('线段变短了');
			}
		else{
			var w= document.getElementById("leftp");
			var s=Number(w.style.width.slice(0,-2));
			s-=2;
			w.style.width=String(s)+"px";
			//alert('线段变短了');
			}
	}
	if(e.keyCode==76){ //L变长
		if((t>=1&&t<=10)||(t>=31&&t<=40))
		{
			var w= document.getElementById("rightp");
			var s=Number(w.style.width.slice(0,-2));
			s+=2;
			w.style.width=String(s)+"px";
			//alert('线段变长了');
			}
		else{
			var w= document.getElementById("leftp");
			var s=Number(w.style.width.slice(0,-2));
			s+=2;
			w.style.width=String(s)+"px";
			//alert('线段变长了');
			}
	}
}
function shorter()
{
	var t=Number(getQueryString("trial"));
	if((t>=1&&t<=10)||(t>=31&&t<=40))
	{
		var w= document.getElementById("rightp");
		var s=Number(w.style.width.slice(0,-2));
		s-=2;
		w.style.width=String(s)+"px";
		}
	else
	{
		var w= document.getElementById("leftp");
		var s=Number(w.style.width.slice(0,-2));
		s-=2;
		w.style.width=String(s)+"px";
		}
		
	}
function longer()
{
	var t=Number(getQueryString("trial"));
	if((t>=1&&t<=10)||(t>=31&&t<=40))
	{
		var w= document.getElementById("rightp");
		var s=Number(w.style.width.slice(0,-2));
		s+=2;
		w.style.width=String(s)+"px";
		}
	else
	{
		var w= document.getElementById("leftp");
		var s=Number(w.style.width.slice(0,-2));
		s+=2;
		w.style.width=String(s)+"px";
		}
		
	
}
function post()
{
	var flanker=String(Math.round(220+Math.random()*100));
	var flanker2=String(Math.round(220+Math.random()*100));
	//alert(flanker);
	//alert(flanker2);
	var lw= Number(document.getElementById("leftp").style.width.slice(0,-2));
	var rw= Number(document.getElementById("rightp").style.width.slice(0,-2));
	var t= Number(getQueryString("trial"));
	//alert(lw);
	//alert(rw);
	
	var userno= getQueryString("userno");
	var age= getQueryString("age");
	var gender=getQueryString("gender");
	var status=getQueryString("status");
	//alert(userno);
	//alert(age);
	//alert(gender);
	var url="pinsert.php?userno="+userno+"&age="+age+"&gender="+gender+"&trial="+t+"&status="+status+"&a="+flanker+"&b="+flanker2+"&c="+lw+"&d="+rw;
	//alert(url);
	alert('提交成功，请开始下一试次');
	window.location.href=url;
}
</script>
</head>
<body onkeydown="adj()">

<div style="font-weight:bold;font-size:30px;text-align:center;width:100%;">请按钮或按键，调整两条线段至它们长度相等<br>按"A"可使线段变短，按"L"可使线段变长<br>调好后请点击确认</div>
<div id="time" style="text-align:center; width:100%; font-size:30px;  font-weight:bold;"></div>
<div id="left" style="width:50%;float:left;text-align:center;"><img id="leftp" src='line.jpg' style="height:200px;"></div>
<div id="right" style="width:50%;float:left;text-align:center;"><img id="rightp" src='line.jpg' style="height:200px; "></div>
<div id="lefti" style="width:50%;text-align:center;font-size:50px;float:left;"></div>
<div id="righti" style="width:50%;text-align:center;font-size:50px;float:left;"></div>
 <div style="width:50%;float:left;text-align:center;"><input type="button" style="text-align:center;align-items:center; height:auto;width:auto; font-size:30px;" value="调节线段变长" onclick="longer()"></div>
 <div style="width:50%;float:left;text-align:center;"><input type="button" style="text-align:center;align-items:center; height:auto;width:auto; font-size:30px;" value="调节线段变短" onclick="shorter()"></div>
<div style="width:100%;float:left;text-align:center;"><input type="button" style="text-align:center;align-items:center; height:auto;width:auto; font-size:30px; " value="确认" onclick="post()"></div>

</body>
</html>