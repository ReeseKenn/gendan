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
	
	// var_dump($uid);
	$sql="delete from users where id = '$uid'";
	$result=mysqli_query($conn,$sql);
	if($result){
		echo "<script>alert('删除成功！');location='admin.html';</script>";
	}
?>