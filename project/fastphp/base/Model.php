<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/25
 * Time: 9:41
 */
namespace fastphp\base;
use fastphp\db;

class Model extends db\Sql
{
    protected $model;

    public function __construct()
    {
        if(!$this->table){
            $this->model=get_class($this);

            $this->model=substr($this->model,0,-5);

            $this->table=strtolower($this->model);
        }
    }
}
