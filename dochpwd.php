<?php 

session_start();//如果不使用没办法使用session
if(!isset($_SESSION['username'])){#没有检测到session user
header("location:index.html");//跳转到首页
exit();
}

$servername = "localhost";
$username = "root";
$password = "root";
$database = "gendan";
 
// 创建连接
$conn = new mysqli($servername, $username, $password, $database);
 
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
// echo "连接成功";
$usr = $_SESSION['username'];
$pwd = $_POST['password']; 
echo $pwd;

//   if ($password=="") { 
//     echo '密码不能为空'; 
//     exit; 
//   } 



$sql="update users SET password = '$pwd' WHERE username = '$usr'" ;
$result=mysqli_query($conn,$sql);
echo $result;
// if($result===""){
//     $sql="select * from users where username='$usr' and password='$password'";
//     $res=mysqli_query($conn,$sql);
//     // var_dump($res);
//     if($res){
//         $row = mysqli_fetch_assoc($res);
//         $role= $row["role"];
//         echo $role;
//     }else{
//         echo "登录失败，请稍后再试";
//     }
// }else{
//     echo"用户名不存在，请核对用户名或联系管理员";
// }
// var_dump($result) ;
?>