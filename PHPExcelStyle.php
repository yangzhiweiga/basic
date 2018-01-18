<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/3
 * Time: 16:44
 */
class PHPExcelStyle
{
    ##供稿单位导出
    public function gonggao_excel()
    {
        $color = '0xCC000000';
        //查询所有供稿单位
        $order = 'paixu asc,id desc';
        $where = array('token' => $this->token, 'status' => '1');
        $data = M('gonggao')->where($where)->order($order)->select();
        //增加供稿单位的文章数量
        foreach ($data as $key => $value) {
            $data[$key]['shuliang'] = M('img')->where(array('gonggaoid' => $value['id']))->count();
            $data[$key]['title'] = M('img')->where(array('gonggaoid' => $value['id']))->getfield('title', true);
        }
        // //查询出所有行数
        // $all_count=0;
        // foreach ($data as $key => $value) {
        //  if(!empty($value['title'])){
        //      $all_count=$all_count+count($value['title']);
        //  }else{
        //      $all_count++;
        //  }
        //重组数组
        foreach ($data as $key => $value) {
            if (!empty($value['title'])) {
                foreach ($value['title'] as $k => $v) {
                    $newData[] = $v;
                }

            } else {
                $newData[] = '';
            }
        }

        //dump($newData);
        //dump($data);
        //die;

        // 引用phpexcel类
        import('Lib/ORG/PHPExcel');
        // 创建对象
        $objPHPExcel = new PHPExcel();
        // 显示错误信息
        error_reporting(E_ALL);
        // Set properties
        $objPHPExcel->getProperties()->setCreator("赵英杰")
            ->setLastModifiedBy("赵英杰")
            ->setTitle("Office 2007 XLSX Test Document")
            ->setSubject("Office 2007 XLSX Test Document")
            ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Test result file");
        // 设置宽度
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(60);
        // 设置行高度
        $objPHPExcel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(20); //设置默认行高
        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);    //第一行行高
        $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);    //第二行行高
        // 字体和样式
        $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setSize(12);   //字体大小
        $objPHPExcel->getActiveSheet()->getStyle('A2:D2')->getFont()->setBold(false); //第二行是否加粗
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);    //第一行是否加粗
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);         //第一行字体大小
        // 设置垂直居中
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('A2:D2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        //边框样式
        $styleArray = array(
            'borders' => array(
                'allborders' => array(
                    //'style' => PHPExcel_Style_Border::BORDER_THICK,//边框是粗的
                    'style' => PHPExcel_Style_Border::BORDER_THIN,//细边框
                    'color' => array('argb' => $color),
                ),
            ),
        );
        $objPHPExcel->getActiveSheet()->getStyle('A2:D2')->applyFromArray($styleArray);
        //边框
        //$objPHPExcel->getActiveSheet()->getStyle('A2:D2')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        // 设置水平居中
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        // 合并
        $objPHPExcel->getActiveSheet()->mergeCells('A1:D1');

        // 表头
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '供稿单位文章统计')
            ->setCellValue('A2', '编号')
            ->setCellValue('B2', '供稿单位')
            ->setCellValue('C2', '文章数量')
            ->setCellValue('D2', '文章名称');
        // 内容
        // for ($i = 0, $len = count($data); $i < $len; $i++) {
        //     $objPHPExcel->getActiveSheet(0)->setCellValue('A' . ($i + 3), $i);
        //     $objPHPExcel->getActiveSheet(0)->setCellValue('B' . ($i + 3), $data[$i]['gonggao']);
        //     $objPHPExcel->getActiveSheet(0)->setCellValue('C' . ($i + 3), $data[$i]['shuliang']);
        //     $objPHPExcel->getActiveSheet(0)->setCellValue('D' . ($i + 3), $data[$i]['status']);
        //     $objPHPExcel->getActiveSheet()->getStyle('A' . ($i + 3) . ':D' . ($i + 3))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        //     $objPHPExcel->getActiveSheet()->getStyle('A' . ($i + 3) . ':D' . ($i + 3))->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        //     $objPHPExcel->getActiveSheet()->getRowDimension($i + 3)->setRowHeight(16);
        // }

        //重构内容-文章名称录入
        for ($i = 0, $len = count($newData); $i < $len; $i++) {
            $objPHPExcel->getActiveSheet(0)->setCellValue('D' . ($i + 3), $newData[$i]);
            $objPHPExcel->getActiveSheet()->getStyle('A' . ($i + 3) . ':D' . ($i + 3))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            //左对齐
            $objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            //边框设置
            //$objPHPExcel->getActiveSheet()->getStyle('A' . ($i + 3) . ':D' . ($i + 3))->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
            // $objPHPExcel->getActiveSheet()->getRowDimension($i + 3)->setRowHeight(16);  //重构行高
            $objPHPExcel->getActiveSheet()->getStyle('A' . ($i + 3) . ':D' . ($i + 3))->applyFromArray($styleArray);
        }

        // //查询出所有行数
        // $all_count=0;
        // foreach ($data as $key => $value) {
        //  if(!empty($value['title'])){
        //      $all_count=$all_count+count($value['title']);
        //  }else{
        //      $all_count++;
        //  }

        //合并对应单元格并录入编号/供稿单位/数量。
        $ii = 3;//从第三行开始的
        for ($i = 0, $len = count($data); $i < $len; $i++) {
            if (count($data[$i]['title']) > 0) {
                //合并 注意-1，因为当前单位有内容且是第一篇
                $objPHPExcel->getActiveSheet()->mergeCells('A' . ($ii) . ':A' . ($ii - 1 + count($data[$i]['title'])));
                $objPHPExcel->getActiveSheet()->mergeCells('B' . ($ii) . ':B' . ($ii - 1 + count($data[$i]['title'])));
                $objPHPExcel->getActiveSheet()->mergeCells('C' . ($ii) . ':C' . ($ii - 1 + count($data[$i]['title'])));

                //录入记录
                $objPHPExcel->getActiveSheet(0)->setCellValue('A' . ($ii), $i + 1);
                $objPHPExcel->getActiveSheet(0)->setCellValue('B' . ($ii), $data[$i]['gonggao']);
                $objPHPExcel->getActiveSheet(0)->setCellValue('C' . ($ii), count($data[$i]['title']));

                //居中
                $objPHPExcel->getActiveSheet()->getStyle('A' . ($ii))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $objPHPExcel->getActiveSheet()->getStyle('B' . ($ii))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $objPHPExcel->getActiveSheet()->getStyle('C' . ($ii))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                $ii = $ii - 1 + count($data[$i]['title']);
                $ii++;
            } else {
                //录入记录
                $objPHPExcel->getActiveSheet(0)->setCellValue('A' . ($ii), $i + 1);
                $objPHPExcel->getActiveSheet(0)->setCellValue('B' . ($ii), $data[$i]['gonggao']);
                $objPHPExcel->getActiveSheet(0)->setCellValue('C' . ($ii), count($data[$i]['title']));

                //居中
                $objPHPExcel->getActiveSheet()->getStyle('A' . ($ii))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $objPHPExcel->getActiveSheet()->getStyle('B' . ($ii))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $objPHPExcel->getActiveSheet()->getStyle('C' . ($ii))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $ii++;
            }
        }


        // Rename sheet
        $objPHPExcel->getActiveSheet()->setTitle('供稿单位文章统计');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        // 输出
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . '供稿单位' . '.xls"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

}
