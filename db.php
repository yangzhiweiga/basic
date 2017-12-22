<?php
include "common.php";
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/15
 * Time: 17:40
 */
$dbms='mysql';     //数据库类型
$host='localhost'; //数据库主机名
$dbName='book';    //使用的数据库
$user='root';      //数据库连接用户名
$pass='123456';          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";

try{
    $opts_values = array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8');
    $dbh=new PDO($dsn,$user,$pass,$opts_values);
    echo "连接成功\n";
    $sql="select * from `category_index`";
    $result=$dbh->query($sql);
    foreach($result as $row){
        p($row);
    }

}catch(Exception $e){
    echo $e->getMessage();
}

