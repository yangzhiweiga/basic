<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2017/12/23
 * Time: 0:49
 */

namespace app\controller;
use app\model\ItemModel;
use fastphp\base\Controller;

class ItemController extends Controller
{
    function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
    }

    function index(){
        $keyword=isset($_GET['keyword'])?$_GET['keyword']:'';
        $r=(new ItemModel())->search($keyword);

        $this->assign('title','查询条目');
        $this->assign('keyword',$keyword);
        $this->assign('item',$r);
        $this->render();
    }

    /**
     * 搜索关键词
     */
    function search(){
        $keyword=isset($_GET['keyword'])?$_GET['keyword']:'';
        $r=(new ItemModel())->search($keyword);

        $this->data['title']='查询类目';
        $this->data['keyword']=$keyword;
        $this->data['books']=$r;
        $this->assigns($this->data);
        $this->render();
    }
}