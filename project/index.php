<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2017/12/22
 * Time: 22:08
 */
define('APP_PATH',__DIR__.'/');
define('APP_DEBUG',true);
require(APP_PATH.'fastphp/Fastphp.php');
require("common/common.php");
$config=require(APP_PATH.'config/config.php');
//实例化框架类
(new \fastphp\FastPhp($config))->run();