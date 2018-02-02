<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/22
 * Time: 15:00
 */
$date=date("Y-m-d H:i:s",strtotime("yesterday"));
$date=date("Y-m-d H:i:s",strtotime("today"));
$day = strtotime('00:00');
print_r($day);
print_r(date("Y-m-d H:i:s",$day));