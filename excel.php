<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/2
 * Time: 13:42
 */
require_once dirname(__FILE__).'./Classes/PHPExcel.php';
class ExcelManage
{
    protected $objPHPExcel;

    /**
     * 实例化PHPExcel对象
     *
     * ExcelManage constructor.
     */
    function __construct()
    {
        $this->objPHPExcel=new PHPExcel();
    }

    /**
     *
     */
    function setFileMessage(){
        $this->objPHPExcel->getProperties()->setCreator("author_message");
    }
}