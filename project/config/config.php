<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2017/12/22
 * Time: 22:11
 */
//数据库配置
$config=array();
$_SERVER['dev']=1;
if(isset($_SERVER['dev'])&&$_SERVER['dev']){
    $config['db']['host']='localhost';
    $config['db']['username']='root';
    $config['db']['password']='root';
    $config['db']['dbname']='book';
    $config['db']['charset']='utf8';
//默认控制器和操作名
    $config['defaultController']='Item';
    $config['defaultAction']='index';
}
return $config;