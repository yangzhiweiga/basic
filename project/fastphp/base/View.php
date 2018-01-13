<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/12/23
 * Time: 18:39
 */
namespace fastphp\base;

/**
 * 视图基类
 *
 * Class View
 * @package fastphp\basic
 */
class View
{
    protected $variables=array();
    protected $_controller;
    protected $_action;

    function __construct($controller,$action)
    {
        $this->_controller=strtolower($controller);
        $this->_action=strtolower($action);
    }

    public function assign($name,$value){
        $this->variables[$name]=$value;
    }

    /**
     * @param string $layout
     * @throws \Exception
     */
    public function render($layout=''){
        extract($this->variables);
        //默认页头和页脚文件
        $defaultHeader=APP_PATH.'app\views\header.php';
        $defaultFooter=APP_PATH.'app\views\footer.php';
        //自定义的页头和页脚文件
        $controllerHeader=APP_PATH.'app\views\/'.$this->setViewsDir().'/header.php';
        $controllerFooter=APP_PATH.'app\views\/'.$this->setViewsDir().'/footer.php';
        $layout=!empty($layout)?$layout:$this->_action;
        $controllerLayout=APP_PATH.'app\views\/'.$this->setViewsDir().'/'.$layout.'.php';

        if(is_file($controllerHeader)){
            include ("$controllerHeader");
        }else{
            include ("$defaultHeader");
        }

        if(is_file($controllerFooter)){
            include ("$controllerFooter");
        }else{
            include ("$defaultFooter");
        }

        if(is_file($controllerLayout)){
            include ("$controllerLayout");
        }else{
            throw new \Exception("无法找到视图文件");
            echo "<h1>无法找到视图文件</h1>";
        }

    }

    private function setViewsDir(){
        $dir_name=explode('\\',trim($this->_controller,'\\'));
        $dir_name=array_pop($dir_name);
        return substr($dir_name,0,strpos($dir_name,'controller'));
    }
}