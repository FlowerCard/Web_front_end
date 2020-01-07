<?php
header("Content-Type:text/html;charset=utf8");

if(!isset($_POST)){
    exit("错误执行");
}//判断是否有submit操作

$userName=$_POST['userName'];//post获取表单里的userName
$feedback=$_POST['feedback'];//post获取表单里的feedback

$connent = str_replace("","<br />",htmlspecialchars($feedback));

include ('connect.php');//链接数据库
$q="insert into `feedback` (`UserName`, `FeedBack`) values ('$userName','$connent')";//向数据库插入表单传来的值的SQL
//  INSERT INTO `feedback` (`UserName`, `FeedBack`) VALUES ('test01', 'asdaddfadfasdfasdfasdfasdgadf')
$reslut=mysqli_query($con,$q);//执行sql

if(!$reslut){
    echo ("Error：".mysqli_error($con));
}else{
    echo "
            <script>
                alert('意见反馈成功');
                setTimeout(function() {
                  window.location.href='http://127.0.0.1:8080/PHP_Work/index.html';
                },1500);
            </script>
        ";//如果成功使用js  1秒后转到登录页面
}

mysqli_close($con);