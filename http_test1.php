<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/27
 * Time: 16:57
 */
use Workerman\Worker;

require_once __DIR__ . '/Workerman/Autoloader.php';

//创建一个worker监听2345端口，使用http协议通讯
$http_worker = new Worker("http://127.0.0.1:2345");
//启动4个进程对外提供服务
$http_worker->count = 4;

$http_worker->onMessage = function ($connection, $data) {
    //向服务器发送信息
    $connection->send('hello world');
};

Worker::runAll();
