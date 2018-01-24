<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/22
 * Time: 15:00
 */
$date=date("Y-m-d H:i:s",strtotime("yesterday"));
$date=date("Y-m-d H:i:s",strtotime("today"));
print_r($date);