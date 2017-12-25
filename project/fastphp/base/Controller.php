<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/23
 * Time: 18:33
 */
namespace fastphp\base;
use fastphp\base;

/**
 * 控制器基类
 */
class Controller
{
    private $_controller;
    private $_action;
    private $_view;
    protected $data=array();

    public function __construct($controller,$action)
    {
        $this->_controller=$controller;
        $this->_action=$action;
        $this->_view=new View($controller,$action);
    }

    /**
     * 单个分配变量
     *
     * @param $name
     * @param $value
     */
    public function assign($name,$value){
        $this->_view->assign($name,$value);
    }

    /**
     * 多个变量分配
     *
     * @param array $data
     */
    public function assigns($data){
        if(is_array($data)){
            foreach($data as $name=>$value){
                $this->assign($name,$value);
            }
        }
    }

    /**
     * 渲染视图
     *
     * @param $layout
     */
    public function render($layout=''){
        $layout=!empty($layout)?$layout:$this->_action;
        $this->_view->render($layout);
    }
}