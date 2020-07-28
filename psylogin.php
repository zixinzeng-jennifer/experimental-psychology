
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>login</title>
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

function searchpost()
{
  // var form1 = document.getElementsByName("form1")[0];
  var form1 = document.form1;
  var no=document.getElementById("a").value;
  var age=document.getElementById("b").value;
  var gender=document.getElementById("c").value;
  var status=document.getElementById("d").value;
  form1.action = "readme1.php?userno="+no+"&age="+age+"&gender="+gender+"&status="+status;
  // form1.method = "post";
  form1.submit();
}

</script>
</head>



<body>
<div style="text-align:center;font-size:60px; color:blue;font-weight:bold">欢迎参加实验！</div>
<div style="text-align:center;font-size:60px; color:blue;font-weight:bold">请在框中输入个人信息，然后按钮提交</div>
<?php
echo '<div style="height:auto; position:relative; top:50%; left:15%;"><form method="post" name="form1">
				<input class="search" type="text" id="a" name="no" placeholder="输入被试号" autocomplete="off">
                <input class="search" type="text" id="b" name="age" placeholder="输入年龄" autocomplete="off">
                <input class="search" type="text" id="c" name="gender" placeholder="输入性别F/M" autocomplete="off">
                <input class="search" type="text" id="d" name="gender" placeholder="输入组别1/2" autocomplete="off">
                <br><br><br><br>
               <br><br><br><br>
               <br><br><br><br>
                </form> </div>';
echo'<br><br><br><br>';
echo' <div style="align-items:center;display:block;text-align:center;"><input type="button" value="确定"   onclick="searchpost()" ></div>';
				
?>
</body>
</html>