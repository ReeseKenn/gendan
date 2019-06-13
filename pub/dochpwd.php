<?php 
require_once "../connect.php";
session_start();
// var_dump($_SESSION);
if(!isset($_SESSION['username'])){#没有检测到session user
// header("location:index.html");//跳转到首页
echo "Not Logged In";
exit();
}

// $servername = "localhost";
// $username = "root";
// $password = "root";
// $database = "gendan";
 
// 创建连接
$conn = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
 
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
// echo "连接成功";
$usr = $_SESSION['username'];
// $role = $_SESSION['role'];
$pwd = $_POST['password']; 
// echo $role;

  if ($pwd=="") { 
    echo '密码不能为空！'; 
    exit; 
  } 



$sql="update users SET password = '$pwd' WHERE username = '$usr'" ;
$result=mysqli_query($conn,$sql);
echo $result;
exit;
?>