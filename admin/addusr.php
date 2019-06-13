<?php 
require_once "../connect.php";
  // 创建连接
  $conn = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
  mysqli_set_charset($conn,'UTF8');
  // 检测连接
  if ($conn->connect_error) {
      die("连接失败: " . $conn->connect_error);
  } 
  // echo "连接成功";
$username = $_POST['username']; 
$password = $_POST['password'];
$role = $_POST['role']; 
$department = $_POST['department']; 
// echo $pwd;

  if ($password=="") { 
    echo '密码不能为空！'; 
    exit; 
  } 

	
$date = date('Y-m-d h:i:s', time());
// echo $date;
$sql="insert into users (username, password,role,department,date)values( '$username', '$password', '$role', '$department', '$date')";
$result=mysqli_query($conn,$sql);
echo $result;
exit;
?>