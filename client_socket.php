<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/27
 * Time: 14:05
 */
header("Content-type: text/html; charset=utf-8");
$socket=socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
//接收套接流的最大超时时间5秒，后面是微秒单位超时时间，设置为零，表示不管它
socket_set_option($socket, SOL_SOCKET, SO_RCVTIMEO, array("sec" => 1, "usec" => 0));
//发送套接流的最大超时时间为6秒
socket_set_option($socket, SOL_SOCKET, SO_SNDTIMEO, array("sec" => 6, "usec" => 0));
if(socket_connect($socket,'127.0.0.1',8888)==false){
    echo 'connect fail message:'.socket_strerror(socket_last_error());
}else{
//    $message='I love you 我爱你 socket';
    $message=!empty($_GET['message'])?$_GET['message']:'I love you 我爱你 socket';
//    $message=mb_convert_encoding($message,'gbk','utf-8');
    if(socket_write($socket,$message,strlen($message))==false){
        echo 'fail to write:'.socket_strerror(socket_last_error());
    }else{

        echo '客户端连接成功!'."<br>";
        while($callback=socket_read($socket,1024)){
            echo  'server return message is'.PHP_EOL.$callback;
        }
    }
}
socket_close($socket);