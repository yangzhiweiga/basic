<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/27
 * Time: 13:50
 */
//创建一个socket套接流
$socket=socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
//绑定接受的套接主机和端口，与客户端对应
if(socket_bind($socket,'127.0.0.1',8888)==false){
    echo 'server bind fail:'.socket_strerror(socket_last_error());
}
if(socket_listen($socket,4)==false){
   echo 'server listen fail:'.socket_strerror(socket_last_error());
}
//让服务器无限获取客户端传过来的信息
do{
    //接受客户端传过来的信息
    $accept_resource=socket_accept($socket);//socket_accept的作用就是接受socket_bind()所绑定的主机发过来的套接流

    if($accept_resource!==false){
        //读取客户端传过来的资源，并转化为字符串
        $string=socket_read($accept_resource,1024);
        if($string==1){
            $string='小明';
        }else{
            $string='游客';
        }
        $return_client='server receiver is response:'.$string.PHP_EOL;
        //向socket_accept的套接流写入信息,也就是回馈信息给socket_bind()所绑定的主机客户端
        socket_write($accept_resource,$return_client,strlen($return_client));
    }else{
        echo 'socket_read is fail';
    }
    //socket_close的作用就是关闭socket_create()或socket_accept()所建立的套接流
    socket_close($accept_resource);

}while(true);
socket_close($socket);