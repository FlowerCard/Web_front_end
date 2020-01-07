<?php
    header("Content-Type:text/html;charset=utf8");

    if(!isset($_POST)){
        exit("错误执行");
    }//判断是否有submit操作

    include("connect.php");//链接数据库
    $userName=$_POST['userName'];//post获取用户名表单值
    $passWord=$_POST['passWord'];//post获取密码表单值
    $mobile=$_POST['mobile'];//post获取手机号表单值

    if($userName && $passWord && $mobile){//如果用户名和密码都不为空
        $sql = "select * from `userinfo` where UserName = '$userName' and PassWord = '$passWord' and PhoneNumber = '$mobile'";//检测数据库是否有对应的值
//        $sql = "SELECT *  FROM `userinfo` WHERE `UserName` = \'test01\' AND `PassWord` = \'ABCabc123.\' AND `PhoneNumber` = \'15356023550\'";
        $result = mysqli_query($con,$sql);//执行sql
        $rows = mysqli_num_rows($result);//返回一个值
        if($rows){//0 false; 1 true
            header("refresh:0;url=http://127.0.0.1:8080/PHP_Work/welcome.html");//如果成功跳转至welcome.html页面
			//我的端口号是8080，根据运行环境更改，下面所有的端口都是一样的
            exit();
        }else{
            echo "用户名或密码或手机号错误";
            echo "
                <script>
                    setTimeout(function() {
                      window.location.href='http://127.0.0.1:8080/PHP_Work/index.html';
                    },1500);
                </script>
            ";//如果错误使用js 1.5秒后跳转到登录页面
        }
    }else{//如果用户名或密码有空
        echo "请输入用户名、密码和手机号";
        echo "
            <script>
                setTimeout(function() {
                  window.location.href='http://127.0.0.1:8080/PHP_Work/index.html';
                },1500);
            </script>
        ";//如果错误使用js  1.5秒后转到登录页面
    }
    mysqli_close($con);