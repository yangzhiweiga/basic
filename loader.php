<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/22
 * Time: 10:49
 */
//未定义类时系统自动调用__autoload()方法
/**
 * @param $class
 */
//$res=instance('He');
//echo $res;
//if($res){
//    new He();
//}
//function __autoload($class){
//
//}
//function instance($class){
//    try{
//        if(class_exists($class,false)){
//            return new $class();
//        }
//        if(function_exists('__autoload')){
//            __autoload($class);
//        }
//        if(class_exists($class,false)){
//            return new $class();
//        }else{
//            throw new Exception("找不到定义的类");
//        }
//        return true;
//    }catch (Exception $e){
//        return $e->getMessage();
//    }
//
//}


class Loader
{
    public static $vendor_map=array(
        'app'=>__DIR__.DIRECTORY_SEPARATOR.'app',
    );

    public static function autoload($class){
        try{
            $file=self::findFile($class);
            if(file_exists($file)){
                self::includeFile($file);
            }else{
                throw new Exception("未定义类");
            }
        }catch (Exception $e){
            echo $e->getMessage();exit;
        }

    }

    private static function findFile($class){
        $vendor=substr($class,0,strpos($class,'\\'));
        $vendorDir=self::$vendor_map[$vendor];
        $filePath=substr($class,strlen($vendor)).'.php';
        return strtr($vendorDir.$filePath,'\\',DIRECTORY_SEPARATOR);
    }

    private static function includeFile($file){
        if(file_exists($file)){
            include $file;
        }
    }
}