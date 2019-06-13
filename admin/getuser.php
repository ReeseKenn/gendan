<?php  
require_once "../connect.php";
session_start();//如果不使用没办法使用session
if(!isset($_SESSION['username'])){#没有检测到session user
header("location:index.html");//跳转到首页
exit();
}
// echo $_SESSION['username'];
    header("Content-type:text/html;charset=utf-8");//字符编码设置  
    //创建连接  
    $conn =mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);  
    mysqli_set_charset($conn,'UTF8');
    //检测连接  
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 
    // echo "连接成功";
    
    $sql = "SELECT * FROM users";  
    $result = mysqli_query($conn,$sql);  
    // var_dump($result);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }

    $jarr = array();
    while ($rows=mysqli_fetch_array($result)){
        $count=count($rows);//不能在循环语句中，由于每次删除 row数组长度都减小  
        for($i=0;$i<$count;$i++){  
            unset($rows[$i]);//删除冗余数据  
        }
        array_push($jarr,$rows);
    }
    // print_r($jarr);//查看数组
    // echo "<br/>";
    
    // echo '<hr>';

    // echo '编码后的json字符串：';
    $str=json_encode($jarr);

    // var_dump($_SESSION);
    // session_destroy();
    echo $str;//将数组进行json编码
    // echo '<br>';
    // $arr=json_decode($str);//再进行json解码
    // echo '解码后的数组：';
    // print_r($arr);//打印解码后的数组，数据存储在对象数组中
    mysqli_close($conn);
?> 