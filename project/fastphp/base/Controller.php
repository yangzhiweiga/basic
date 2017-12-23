<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/23
 * Time: 18:33
 */
namespace fastphp\base;

/**
 * 控制器基类
 */
class Controller
{
    private $_controller;
    private $_action;
    private $_view;

    public function __construct($controller,$action)
    {
        $this->_controller=$controller;
        $this->_action=$action;
        $this->_view=new View($controller,$action);
    }

    /**
     * 分配变量
     *
     * @param $name
     * @param $value
     */
    public function assign($name,$value){
        $this->_view->assign($name,$value);
    }

    /**
     * 渲染视图
     */
    public function render(){
        $this->_view->render();
    }
}