<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/25
 * Time: 14:45
 */
namespace app\model;

use fastphp\base\Model;
use fastphp\db\Db;

class ItemModel extends Model
{
    protected $table='book_info';

    /**
     * @param $keyword
     * @return array
     */
    public function search($keyword=''){
        $sql="select * from {$this->table} where `book_name` like :book_name";
        $sth=Db::pdo()->prepare($sql);
        $sth=$this->formatParam($sth,[':book_name'=>"%$keyword%"]);
        $sth->execute();

        return $sth->fetchAll();
    }
}