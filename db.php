<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/22
 * Time: 16:57
 */
class DB
{
    private static $instance;
    private $host = 'localhost'; //数据库主机
    private $user = 'root'; //数据库用户名
    private $pwd = ''; //数据库用户名密码
    private $database = 'imoro_imoro'; //数据库名
    private $charset = 'utf8'; //数据库编码，GBK,UTF8,gb2312
    private $link;             //数据库连接标识;
    private $result;

    /**
     * instanceof操作符检查某个实例是否是某个特定的类型，实例是否从某个特定的类型继承，实例或者他的任何祖先类是否实现了特定的接口
     */
    public static function getInstance()
    {
        //当前类是否已经被实例化
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
        self::getInstance();
        $this->link = @mysql_connect($this->host, $this->user, $this->pwd);
        $this->setDatabase();
        $this->setCharsetCode();
        return $this->link;
    }

    private function setDatabase()
    {
        $this->result = mysql_select_db($this->database);
        return $this->result;
    }

    private function setCharsetCode()
    {
        $sql = sprintf("SET NAMES {$this->charset}");
        $this->query($sql, $this->link);
    }

    public function query($sql, $link = '')
    {
        $this->result = mysql_query($sql, $this->link);
        return $this->reuslt;
    }

    public function fetch_array($fetch_array)
    {
        return $this->result = mysql_fetch_array($fetch_array, MYSQL_ASSOC);
    }

    public function num_rows($query)
    {
        return $this->result = mysql_num_rows($query);
    }
//    public function __clone(){
//        trigger_error("Clone is not allow",E_USER_ERROR);
//    }

    private function __clone()
    {

    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        mysql_close($this->link);
    }
}