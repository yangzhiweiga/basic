<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/22
 * Time: 17:36
 */
spl_autoload_register();
class Factory
{
    public static function createObj($operate){
        switch($operate){
            case '+':
                return new OperationAdd();
            break;
            case '-':
                return new OperationSub();
                break;
            case '*':
                return new OperationMul();
                break;
            case '/':
                return new OperationDiv();
                break;
        }
    }
}
$test=Factory::createObj('+');
$result=$test->getValue(23,6);
print_r($result);