<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/25
 * Time: 9:52
 */
namespace fastphp\db;

use PDO;
use PDOException;
class Db
{
    private static $pdo=null;

    public static function pdo(){
        if(self::$pdo!==null){
            return self::$pdo;
        }

        try{
            $dsn=sprintf('mysql:host=%s;dbname=%s;charset=utf8',DB_HOST,DB_NAME);
            $option=array(\PDO::ATTR_DEFAULT_FETCH_MODE=>\PDO::FETCH_ASSOC);

            return self::$pdo=new PDO($dsn,DB_USER,DB_PASS,$option);
        }catch (\PDOException $e){
            exit('数据库连接失败:'.$e->getMessage());
        }
    }
}