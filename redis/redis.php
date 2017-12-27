<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/26
 * Time: 10:57
 */
//实例化redis
$redis=new Redis();
//连接redis
$redis->connect("localhost");
//redis授权设置密码
$redis->auth('123456');