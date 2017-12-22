<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/22
 * Time: 10:32
 */
//include "./Demo.php";
//spl_autoload_register();

class Son extends Demo{
    function __construct()
    {
        echo "<hr>";
        echo __CLASS__;
    }

    function show($n='123'){
    }
    function test(){

    }

}
$son=new Son();
print_r($son->show(123));
function __autoload($class){
    $file=$class.'.php';
    if(file_exists($file)){
        include "{$file}";
    }
}