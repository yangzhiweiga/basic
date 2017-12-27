<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/26
 * Time: 10:47
 */
$int='123';
if(!filter_var($int,FILTER_VALIDATE_INT)){
    echo "不是一个合法的整数";
}else{
    echo "是个合法的整数";
}