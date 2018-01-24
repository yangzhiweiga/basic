<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/19
 * Time: 10:29
 */


$j='[{"id":30033,"order_id":"1728150245214","uid":2332684,"domain":"abc","client_type":2,"order_type":15,"trade_no":"","trade_status":"","buyer_account":"","payment_time":"","amount":"10.00","exchange_coin":0,"status":0,"t":1507528645,"passport_order_id":"","amount_id":"","settlement_proportion":"0.50"}][{"id":30032,"order_id":"1728149962928","uid":2332342,"domain":"hao","client_type":2,"order_type":14,"trade_no":"4200000019201710097021547720","trade_status":"SUCCESS","buyer_account":"o1LKT1fYg3oGj-OlyRlpgIcLurRs","payment_time":"2017-10-09 13:52:49","amount":"10.00","exchange_coin":1000,"status":1,"t":1507528362,"passport_order_id":"","amount_id":"","settlement_proportion":"0.50"}]';
$orderList=json_decode($j,true);
$sum+=array_sum(array_map(create_function('$val','return $val["amount"];'),$orderList));
