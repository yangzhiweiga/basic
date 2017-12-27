<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/27
 * Time: 15:08
 */
use Workerman\Worker;

require_once __DIR__ . '/Workerman/Autoloader.php';

$worker = new Worker("websocket://0.0.0.0:1234");

/**
 * 发送消息给所有人
 * @param $msg
 */
function sendToAll($msg) {
    global $worker;
    foreach ($worker->connections as $conn) {
        $conn->send($msg);
    }
}

/**
 * 处理消息
 */
$worker->onMessage = function ($connection, $data) use ($worker) {
    $data = json_decode($data, true);
    switch ($data['type']) {
        case 'login':
            $connection->name = $data['name'];
            sendToAll("欢迎 {$connection->name} 进入房间");
            break;
        case 'say':
            sendToAll($connection->name . "：" . $data['msg']);
            break;
        default:
            break;
    }
};

/**
 * 某连接断开
 */
$worker->onClose = function ($connection) use ($worker) {
    sendToAll("{$connection->name} 退出房间");
};

//进程数
$worker->count = 4;

//启动
Worker::runAll();