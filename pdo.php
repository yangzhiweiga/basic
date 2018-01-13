<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/25
 * Time: 11:16
 */
//pdo连接
$dbms = 'mysql';
$host = 'localhost';
$dbName = 'book';
$user = 'root';
$pass = '123456';
$dsn = "$dbms:host=$host;dbname=$dbName";

try {
    $db = new PDO($dsn, $user, $pass);//初始化一个pdo对象
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//错误异常
    $db->query("set names utf8");//设置编码
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);//如果你的sql服务器不支持真正的预处理用此语句进行修复
    $book_name='倾世兵团';
    $statement = $db->prepare('select * from `book_info` where `book_name`=:book_name');//模式1
//    $statement = $db->prepare('select * from `book_info` where `book_name`=?');//模式2
    $statement->bindValue(':book_name','倾世兵团');//模式1
//    $statement->bindValue(1,$book_name);//模式2
//    $statement->bindParam(':book_name',$book_name);//只有执行时才被调用第二个参数必须为变量
//    $statement->execute(array(':book_name'=>'倾世兵团'));//避免bindValue带来碎片代码用execute方法代替
    $statement->execute();
    print_r($statement->fetch());
    exit;

    /**
     * PDO::query()主要用于有记录结果返回的操作特别是select操作
     * PDO::exec()主要是针对没有结果集合返回的操作如插入更新操作
     * PDO::lastInsertId()返回上次插入操作主键列表类型是自增的最后自增ID
     * PDOStatement::fetch()用来获取一条记录
     * PDOStatement::fetchAll()用来获取所有记录集
     */

} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}