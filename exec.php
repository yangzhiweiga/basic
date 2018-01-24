<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23
 * Time: 11:01
 */
header('Content-Type: text/html; charset=utf-8'); //网页编码
system("pwd",$result);
print $result;//输出命令的结果状态码

$output = shell_exec('ls -lart');
echo "<pre>$output</pre>";

echo `dir`;
