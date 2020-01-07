<?php
    $server="localhost";//主机
    $db_username="root";//用户名
    $db_password="ABCabc123.";//密码
    $dbname="userdb";//数据库

    $con = mysqli_connect($server,$db_username,$db_password,$dbname);//连接数据库
    if(!$con){
        die("不能连接数据库".mysqli_error());//如果连接失败输出错误
    }
