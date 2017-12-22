<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/22
 * Time: 11:08
 */
//spl_autoload_register(function ($class) { // class = os\Linux
//    /* 限定类名路径映射 */
//    $class_map = array(
//        // 限定类名 => 文件路径
//        'os\\Linux' => './Linux.php',
//    );
//
//    /* 根据类名确定文件名 */
//    $file = $class_map[$class];
//
//    /* 引入相关文件 */
//    if (file_exists($file)) {
//        include $file;
//    }
//});
//new \os\Linux();

//$class='app\view\new\Index';
//
//$vendor_map=array(
//    'app'=>'C:\BaiDu',
//);
//
//$vendor=substr($class,0,strpos($class,'\\'));
//$vendor_dir=$vendor_map[$vendor];
//$rel_path=dirname(substr($class,strlen($vendor)));
//$file_name=basename($class).'.php';
////输出文件所在路径
//echo $vendor_dir.$rel_path.DIRECTORY_SEPARATOR.$file_name;

namespace app\mvc\view\home;

class Index{
    function __construct()
    {
        echo "<h1>";
        echo __CLASS__;
        echo "</h1>";
    }
}