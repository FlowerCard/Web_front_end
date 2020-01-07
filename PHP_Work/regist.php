<?php
    header("Content-Type:text/html;charset=utf8");

    if(!isset($_POST['submit'])){
        exit("错误执行");
    }//判断是否有submit操作

    $userName=$_POST['userName'];//post获取表单里的userName
    $passWord=$_POST['passWord'];//post获取表单里的passWord
    $mobile=$_POST['mobile'];//post获取表单里的mobile

    include ('connect.php');//链接数据库
    $q="insert into userinfo(UserName,PassWord,PhoneNumber) values ('$userName','$passWord','$mobile')";//向数据库插入表单传来的值的SQL
    $reslut=mysqli_query($con,$q);//执行sql

    if(!$reslut){
        echo ("Error：".mysqli_error($con));
    }else{
        echo "注册成功";
        echo "
            <script>
                setTimeout(function() {
                  window.location.href='http://127.0.0.1:8080/PHP_Work/index.html';
                },1500);  
            </script>
        ";//如果成功使用js  1秒后转到登录页面
    }

    mysqli_close($con);