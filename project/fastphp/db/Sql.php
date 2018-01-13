<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/25
 * Time: 9:44
 */
namespace fastphp\db;

class Sql
{
    //数据库表名
    protected $table;
    //条件
    private $filter = '';
    private $param = array();

    /**
     * 查询拼装条件
     *
     * @param array $where
     * @param array $param
     * @return $this
     */
    public function where($where = array(), $param = array())
    {
        if ($where) {
            $this->filter .= ' WHERE ';
            $this->filter .= implode(' ', $where);

            $this->param = $param;
        }

        return $this;
    }

    /**
     * 拼装查询条件
     * $this->order(['id DESC','title ASC',...])
     *
     * @param array $order
     * @return $this
     */
    public function order($order = array())
    {
        if ($order) {
            $this->filter .= ' ORDER BY ';
            $this->filter .= implode(',', $order);
        }

        return $this;
    }

    public function fetchAll()
    {
        $sql = sprintf("select * from `%s` %s", $this->table, $this->filter);
        $sth = Db::pdo()->prepare($sql);
        $sth = $this->formatParam($sth, $this->params);
        $sth->execute();

        return $this->fetchAll();
    }

    /**
     * @param \PDOStatement $sth
     * @param array $params
     * @return \PDOStatement
     */
    public function formatParam(\PDOStatement $sth, $params = array())
    {
        foreach ($params as $param => &$value) {
            $param = is_int($param) ? $param + 1 : ':' . ltrim($param, ':');
            $sth->bindParam($param, $value);
        }
        return $sth;
    }

    public function fetch()
    {
        $sql = sprintf("select * from `%s` %s", $this->table, $this->filter);
        $sth = Db::pdo()->prepare($sql);
        $sth = $this->formatParam($sth, $this->param);
        $sth->execute();

        return $sth->fetch();
    }

    public function delete($id)
    {
        $sql = sprintf("delete from `%s` where `%s` = :%s", $this->table, $this->primary, $this->priary);
        $sth = Db::pdo()->prepare($sql);
        $sth = $this->formatParam($sth, [$this->primary => $id]);
        $sth->execute();

        return $sth->rowCount();
    }

    /**
     * 新增数据
     *
     * @param $data
     * @return mixed
     */
    public function add($data)
    {
        $sql = sprintf("insert into `%s` %s", $this->table, $this->formartInsert($data));
        $sth = Db::pdo()->prepare($sql);
        $sth = $this->formatParam($sth, $data);
        $sth = $this->formatParam($sth, $this->param);
        $sth->execute();

        return $sth->rowCount();
    }

    /**
     * 修改数据
     *
     * @param $data
     * @return mixed
     */
    public function update($data)
    {
        $sql = sprintf("update`%s` set %s %s", $this->table, $this->formatUpdate($data), $this->filter);
        $sth = Db::pdo()->prepare($sql);
        $sth = $this->formatParam($sth, $data);
        $sth = $this->formatParam($sth, $this->param);
        $sth->execute();

        return $sth->rowCount();
    }

    /**
     * 将数组转换成插入格式的sql语句
     *
     * @param $data
     * @return mixed
     */
    private function formartInsert($data)
    {
        $fields = array();
        $names = array();
        foreach ($data as $key => $value) {
            $fields[] = sprintf("`%s`", $key);
            $names[] = sprintf(":%s", $key);
        }

        $field = implode(',', $fields);
        $name = implode(',', $names);

        return sprintf("(%s) value(%s)", $field, $name);
    }

    /**
     *将数组转换成更新各式的sql语句
     *
     * @param $data
     * @return mixed
     */
    private function formatUpdate($data)
    {
        $fields = array();
        foreach ($data as $key => $value) {
            $fields[] = sprintf("`%s` = :%s", $key, $key);
        }

        return implode(',', $fields);
    }
}
