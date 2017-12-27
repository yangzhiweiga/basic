<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/26
 * Time: 10:35
 */
$expire=time()+60*60*24*30;
//设置cookie
setcookie("user","oob",$expire);
if(isset($_COOKIE['user'])){
    //获取cookie
    echo sprintf("欢迎%s",$_COOKIE['user']);
}else{
    echo "游客";
}
//删除cookie
setcookie("user","",time()-3600);
if(isset($_COOKIE['user'])){
    //获取cookie
    echo sprintf("欢迎%s",$_COOKIE['user']);
}else{
    echo "游客";
}

//开启session
session_start();
//设置session
$_SESSION['view']=1;
//获取session
echo $_SESSION['view'];
//销毁
unset($_SESSION['view']);
//彻底销毁所有session
session_destroy();