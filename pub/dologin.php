<?php 

$servername = "localhost";
$username = "root";
$password = "root";
$database = "gendan";
 
// 创建连接
$conn = new mysqli($servername, $username, $password, $database);
mysqli_set_charset($conn,'UTF8');
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
// echo "连接成功";

session_start(); 
$username = stripslashes(trim($_POST['username'])); 
$password = $_POST['password']; 
// echo $password;
  if ($password=="") { 
    echo '用户名不能为空'; 
    exit; 
  } 
  if ($password=="") { 
    echo '密码不能为空'; 
    exit; 
  } 

$_SESSION["username"]=$username;
$sql1="select * from users where username='$username'";
$result=mysqli_query($conn,$sql1);
if($result){
    $sql="select * from users where username='$username' and password='$password'";
    $res=mysqli_query($conn,$sql);
    // var_dump($res);
    if($res){
        $row = mysqli_fetch_assoc($res);
        $role= $row["role"];
        $_SESSION["role"]=$role;
        echo $role;
    }else{
        echo "登录失败，请稍后再试";
    }
}else{
    echo"用户名不存在，请核对用户名或联系管理员";
}
// var_dump($result) ;
?>