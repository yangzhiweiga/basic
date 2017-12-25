<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/25
 * Time: 11:16
 */
//pdo连接
$dbms='mysql';
$host='localhost';
$dbName='book';
$user='root';
$pass='';
$dsn="$dbms:host=$host;dbname=$dbName";

try{
    $dbn=new PDO($dsn,$user,$pass);//初始化一个pdo对象
    
}catch(PDOException $e){}