<?php
require_once "../connect.php";
	$uid=substr($_SERVER["QUERY_STRING"],3);//."<br>"

	 
	// 创建连接
	$conn = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
    mysqli_set_charset($conn,'UTF8');
	// 检测连接
	if ($conn->connect_error) {
	    die("连接失败: " . $conn->connect_error);
	} 
	// echo "连接成功";
	
	//var_dump($proid);
	$sql="select * from users where id = '$uid'";
	$result=mysqli_query($conn,$sql);
	// var_dump($result);
	// $row=mysqli_fetch_array($result);
    // var_dump($row);
    $jarr = array();
    while ($rows=mysqli_fetch_array($result)){
        $count=count($rows);//不能在循环语句中，由于每次删除 row数组长度都减小  
        for($i=0;$i<$count;$i++){  
            unset($rows[$i]);//删除冗余数据  
        }
        array_push($jarr,$rows);
    }
    $str=json_encode($jarr);
    // echo $str;
    // header("location:index.html");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.bootcss.com/twitter-bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css">
    <title>跟单系统-修改用户信息</title>
    <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">

    </script>
</head>
<body>
    <!-- 导航条 start -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">跟单系统</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="admin.html">账号管理</a></li>
                    <li><a href="adduser.html">添加账号</a></li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../pub/changepwd.html">修改密码</a></li>
                    <li><a href="../pub/logout.php">退出登录</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- 导航条 end -->

    <div class="formwrapper">
        <form class="form-horizontal">
            <div class="form-group">
                <label for="addun" class="col-sm-2 control-label">用户名</label>
                <div class="col-sm-10">
                <input type="email" class="form-control" id="addun">
                </div>
            </div>
            <div class="form-group">
                <label for="addpwd" class="col-sm-2 control-label">密码</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="addpwd">
                </div>
            </div>
            <div class="form-group">
                    <label for="addcpwd" class="col-sm-2 control-label">确认密码</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" id="addcpwd">
                    </div>
            </div>
            <div class="form-group">
                <label for="addrole" class="col-sm-2 control-label">用户角色</label>
                <div class="col-sm-10">
                    <select class="form-control"id="addrole">
                        <option>业务员</option>
                        <option>跟单员</option>
                        <option>物流</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                    <label for="addDpt" class="col-sm-2 control-label">用户部门</label>
                    <div class="col-sm-10">
                        <select class="form-control"id="addDpt">
                            <option></option>
                            <option>订单中心</option>
                            <option>服装供应链</option>
                        </select>
                    </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-6 col-sm-6">
                <button id="addusr" type="submit" class="btn btn-default">提交</button>
                </div>
            </div>
        </form>       
    </div>

    <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        $("#addusr").on('click',function(){ 
            var addun = $("#addun").val(); 
            var addpwd= $("#addpwd").val(); 
            var addcpwd= $("#addcpwd").val(); 
            var addrole= $("#addrole").val(); 
            var addDpt= $("#addDpt").val(); 
            // console.log(addun)
            // console.log(addpwd)
            // console.log(addcpwd)
            // console.log(addrole)
            // console.log(addDpt)
            // if(addrole==="业务员"){
            //     addrole="ywy"
            // }
            // if(pwd===""){
            //     alert("密码不能为空！")
            // }else if(pwd!==cpwd){
            //     alert("两次密码不一致！")
            // }else{
                $.ajaxSettings.async = false; 
                $.post('doEdUsr.php',{username:addun,password:addpwd,role:addrole,department:addDpt},function(data) { 
                    console.log(data);
                    console.log(typeof(data));
                    if(data==="1"){
                        alert("修改用户信息成功！")
                    }else{
                        alert("修改失败！")
                    }

                }) 
            // }      
        });
    </script>
</body>
</html>
