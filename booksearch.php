<html>
<head>
    <meta charset="UTF-8">
    <title>入库前查询</title>
    <style>
        .row{
            display:flex;
            flex-wrap:wrap;
            border: 1px solid #e7e7e7;
        }

        .navitem{
            flex:70%;
            text-decoration:none;
            text-align:center;
            padding-top:5px;
            padding-bottom:5px;
            padding-right:3px;
            font-size:90%;
            font-weight:bold;
        }
        .navitem a:hover:not(.active) {
            background-color: #ddd;
        }
        .navitem a{
            display: block;
            color: #666;
            text-decoration: none;
            padding-top:3px;
            padding-bottom:3px;
            padding-right:3px;
        }
        .navitem a.active {
            color: white;
            background-color: #4CAF50;
        }
        a:link{color:black;text-decoration:none;}
        a:visited{color:black;text-decoration:none;}
        a:hover{color:black;text-decoration:none;}
        a:active{color:black;text-decoration:none;}




    </style>
</head>

<body background="bg.jpg">

<!导航栏>
<div class="row" >
    <div class="navitem" style="flex:5%;background-color: #FEFDED">
        <a href="homepage.php" >返回首页</a></div>

    <div class="navitem" style="flex:50%;background-color: #FEFDED"></div>

    <div class="navitem" style="flex:5%;background-color: #FEFDED">
        <a href="employee.php" >返回店员入口</a></div>
</div><br>

<form action="" method="post"   style="width: 100%;text-align: center;font-size: 17px;">
    <labal>书名:</labal> <input style="width:105px;height: 20px;" type="text" name="title" placeholder="书名">&nbsp
    <labal>ISBN:</labal><input style="width:105px;height: 20px;" type="text" name="ISBN" placeholder="ISBN">&nbsp

    <input  name="submit" style="width:60px;height: 20px" type="submit" value="检索">
</form><br><br>


<table style=" background-color: #FEFDED" width="80%" border="1" cellpadding="0" cellspacing="0" align="center">
    <tr>
        <td width="200" style='text-align: center'>书名</td>
        <td width="200" style='text-align: center'>ISBN</td>
        <td width="200" style='text-align: center'>所属分店</td>
        <td width="200" style='text-align: center'>版本</td>
        <td width="200" style='text-align: center'>操作</td>

    </tr>
    <?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="book";
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){die("Connection failed: ". mysqli_connect_error());}
    $conn->query('set names utf8') or die ('query字符集错误');

    $sql = "select title,ISBN,shopno,edition from bookstorage ";
    $r = $conn->query($sql);
    $row=mysqli_fetch_array($r);


        $tj1 = " 1 = 1 ";
        $tj2 = " 1 = 1 ";
        $name = "";

        if (!empty($_POST["title"])) {
            $title = $_POST['title'];
            $tj1 = " title like '%{$title}%'";
        }
        if (!empty($_POST["ISBN"])) {
            $ISBN = $_POST["ISBN"];
            $tj2 = "ISBN = '$ISBN'";
        }


        $sql = "select title,ISBN,shopno ,edition from bookstorage WHERE {$tj1} AND {$tj2} and shopno='".$_COOKIE['shopno']."'";
        $r = $conn->query($sql);
        $rowcount=mysqli_num_rows($r);

        if($rowcount ==0){
            echo "<script> alert('此书不存在，请录入');location.href='newbook.php?title=".$_POST['title']."'; </script>";
            }
        else{
                while ($attr = $r->fetch_row()) {
                    echo " <tr>
    <td style='text-align: center'>{$attr[0]}</td>  
    <td style='text-align: center'>{$attr[1]}</td>
    <td style='text-align: center'>{$attr[2]}</td>
    <td style='text-align: center'>{$attr[3]}</td>";
                    echo "<td style='text-align: center'><a href='newbook.php?ISBN={$attr[1]}' \">修改</a></td>";
                }

            }



    mysqli_close($conn);
    ?>
</table>


</body>
</html>

