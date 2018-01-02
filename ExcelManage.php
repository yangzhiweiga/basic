<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/2
 * Time: 13:42
 */
require_once dirname(__FILE__) . './Classes/PHPExcel.php';
require_once dirname(__FILE__) . './config.php';

class ExcelManage
{
    protected $objPHPExcel;
    protected $config;
    protected $activeSheetIndex;
    protected $charIndex;

    const CHAR=65;
    /**
     * 实例化PHPExcel对象
     *
     * ExcelManage constructor.
     */
    function __construct()
    {
        $this->objPHPExcel = new PHPExcel();
        $this->getConfig();
    }

    /**
     * 导入excel到指定位置
     *
     * @param string $path 文件路径
     * @param array $data 保存数据
     * @return mixed
     */
    function save($data = array(),$path = '')
    {
        if (!is_array($data)) {
            return false;
        }
        if(empty($path)){
            $path=dirname(__FILE__);
        }
        $this->setFileMessage();
        $this->setValue($data);
        $this->savePath($path);
    }

    /**
     * 设置文档信息
     */
    protected function setFileMessage()
    {
        $this->objPHPExcel->getProperties()
            ->setCreator($this->config['creator'])
            ->setLastModifiedBy($this->config['last_modify'])
            ->setTitle($this->config['title'])
            ->setSubject($this->config['subject'])
            ->setDescription($this->config['description'])
            ->setKeywords($this->config['keywords'])
            ->setCategory($this->config['category']);
    }

    /**
     * 数据写入excel表
     *
     * @param array $data
     */
    protected function setValue($data=array())
    {
        $this->loop();
        $this->setValueSheetIndex();
        $obj=$this->objPHPExcel->setActiveSheetIndex($this->activeSheetIndex);

        $column=count(array_keys($data[0]));
        $column=$this->charIndex[$column];
        $obj->mergeCells("A1:{$column}1",$column)->setCellValue('A1','你好');
        $i=3;
        foreach($data as $key=>$value){
            if($i==3){
                $this->setTitle(array_keys($data[0]),$obj);
            }
            $y=0;
            foreach($value as $k=>$v){
                $obj->setCellValue(sprintf("%s%d",$this->charIndex[$y],$i),$v);
                $y++;
            }
            $i++;
        }

        $this->rename();
        $this->objPHPExcel->setActiveSheetIndex(0);
    }


    protected function setTitle($title,$obj){
        for($i=0;$i<count($title);$i++){
            $obj->setCellValue(sprintf("%s2",$this->charIndex[$i]),$title[$i]);
        }
    }

    /**
     * 重命名工作sheet
     *
     * @param string $name
     */
    private function rename($name=''){
        if(empty($name)){
            $name='测试';
        }
        $this->objPHPExcel->getActiveSheet()->setTitle($name);
    }

    /**
     * 选择表索引
     *
     * @param int $index 索引默认0
     */
    protected function setValueSheetIndex($index = 0)
    {
        if (filter_var($index, FILTER_VALIDATE_INT)) {
            $this->activeSheetIndex = $index;
        } else {
            $this->activeSheetIndex = 0;
        }
    }

    /**
     * 获取文档配置
     */
    protected function getConfig()
    {
        $this->config = include(dirname(__FILE__) . './config.php');
    }

    protected function loop(){
        $char_index=array();
        for($loop = 0; $loop < 150; $loop++){
            $quotient = intval($loop / 26);
            $remainder = $loop % 26;

            $f = $quotient>0? chr(self::CHAR+$quotient-1) : '';
            $s = $remainder>=0? chr(self::CHAR+$remainder) : '';

            $char_index[]=$f . $s ;
        }
        $this->charIndex=$char_index;
    }

    /**
     * 保存excel到指定位置
     *
     * @param string $path
     */
    protected function savePath($path=''){
        $objWriter=PHPExcel_IOFactory::createWriter($this->objPHPExcel,'Excel2007');
        $savePath=sprintf("%s/%s.xlsx",$path,time());
        $objWriter->save($savePath);
    }
}

$EXCEl = new ExcelManage();
$data=array(
    array(
        'book_name'=>'倾世兵团',
        't'=>12345678900,
        'author_id'=>1350,
        'author_name'=>'月盈',
        'vip'=>366,
        'bask'=>0,
        'flag'=>0,
        'channel'=>0,
        'service'=>183,
        'tax'=>183
    ),
    array(
        'book_name'=>'倾世兵团2',
        't'=>12345678900,
        'author_id'=>1350,
        'author_name'=>'月盈',
        'vip'=>366,
        'bask'=>0,
        'flag'=>0,
        'channel'=>0,
        'service'=>183,
        'tax'=>183
    )
);
$EXCEl->save($data);