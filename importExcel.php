<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23
 * Time: 16:06
 */
require_once dirname(__FILE__) . './Classes/PHPExcel.php';
require_once dirname(__FILE__) . './config.php';

/**
 *  数据导入
 * @param string $file excel文件
 * @param string $sheet
 * @return string   返回解析数据
 * @throws PHPExcel_Exception
 * @throws PHPExcel_Reader_Exception
 */
function importExecl($file='', $sheet=0){
    $file = iconv("utf-8", "gb2312", $file);   //转码
    if(empty($file) OR !file_exists($file)) {
        die('file not exists!');
    }
    require_once dirname(__FILE__) . './Classes/PHPExcel.php';
    $objRead = new PHPExcel_Reader_Excel2007();   //建立reader对象
    if(!$objRead->canRead($file)){
        $objRead = new PHPExcel_Reader_Excel5();
        if(!$objRead->canRead($file)){
            die('No Excel!');
        }
    }

    $cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');

    $obj = $objRead->load($file);  //建立excel对象
    $currSheet = $obj->getSheet($sheet);   //获取指定的sheet表
    $columnH = $currSheet->getHighestColumn();   //取得最大的列号
    $columnCnt = array_search($columnH, $cellName);
    $rowCnt = $currSheet->getHighestRow();   //获取总行数

    $data = array();
    for($_row=1; $_row<=$rowCnt; $_row++){  //读取内容
        for($_column=0; $_column<=$columnCnt; $_column++){
            $cellId = $cellName[$_column].$_row;
            $cellValue = $currSheet->getCell($cellId)->getValue();
            //$cellValue = $currSheet->getCell($cellId)->getCalculatedValue();  #获取公式计算的值
            if($cellValue instanceof PHPExcel_RichText){   //富文本转换字符串
                $cellValue = $cellValue->__toString();
            }

            $data[$_row][$cellName[$_column]] = $cellValue;
        }
    }

    return $data;
}
$data=importExecl('./category.xlsx');
$category=array();
if($data){
    foreach($data as $item){
        $c=array();
        $item=explode('|',$item['A']);
        list($category_id,$category_name,$pid)=$item;
        $c['cid']=trim($category_id);
        $c['pid']=trim($pid);
        $c['category_name']=trim($category_name);
        array_push($category,$c);
    }
}
//$category=json_encode($category);
$parent=array(
    array(
        'cid'=>6,
        'pid'=>0,
        'category_name'=>'历史军事',
    ),
    array(
        'cid'=>1,
        'pid'=>0,
        'category_name'=>'奇幻玄幻',
    ),
    array(
        'cid'=>3,
        'pid'=>0,
        'category_name'=>'武侠仙侠',
    ),
    array(
        'cid'=>9,
        'pid'=>0,
        'category_name'=>'都市娱乐',
    ),
    array(
        'cid'=>15,
        'pid'=>0,
        'category_name'=>'科幻游戏',
    ),
    array(
        'cid'=>18,
        'pid'=>0,
        'category_name'=>'悬疑灵异',
    ),
    array(
        'cid'=>21,
        'pid'=>0,
        'category_name'=>'竞技同人',
    ),
    array(
        'cid'=>24,
        'pid'=>0,
        'category_name'=>'评论文集',
    ),
    array(
        'cid'=>31,
        'pid'=>0,
        'category_name'=>'都市言情',
    ),
    array(
        'cid'=>32,
        'pid'=>0,
        'category_name'=>'古代言情',
    ),array(
        'cid'=>33,
        'pid'=>0,
        'category_name'=>'幻想时空',
    ),array(
        'cid'=>34,
        'pid'=>0,
        'category_name'=>'耽美同人',
    ),array(
        'cid'=>35,
        'pid'=>0,
        'category_name'=>'短篇美文',
    ),

);
//$parent_category=json_encode($parent);
$category=array('parent_category'=>$parent,'category'=>$category);
file_put_contents('./category.json',json_encode($category));
