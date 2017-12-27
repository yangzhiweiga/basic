<?php
use Workerman\Worker;
require_once __DIR__ . '/Workerman/Autoloader.php';

// 创建一个Worker监听2347端口，不使用任何应用层协议
$tcp_worker = new Worker("tcp://0.0.0.0:2347");

$worker->onConnect = function ($connection){
     echo "connection success\n";
};
// 启动4个进程对外提供服务
$tcp_worker->count = 4;

// 当客户端发来数据时
$tcp_worker->onMessage = function($connection, $data)
{
    // 向客户端发送hello $data
    $connection->send(PHP_EOL.'     ----'.$data.'------'.PHP_EOL);
	sleep(5);
};

// 运行worker
Worker::runAll();