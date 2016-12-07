<?php
/**
 * Created by DianDianYangChe.
 * Auther: taotao
 * Date: 2016/12/2
 * Time: 16:06
 * copyright DianDianYangChe
 * description:
 */
require_once './DDYC_SDK.php';
$ddyc = new DDYC_SDK();
$ddyc->setReturnType('ARRAY');// 设置返回类型 目前仅允许 ARRAY和JSON 可以根据需求自行扩展
//=================违章查询条件==============
//无参数 的调用
//$data = $ddyc->getViolationCondition();
//print_r($data);exit;
//================违章查询条件【带省份】==========
//$data = $ddyc->getViolationConditionAll();
//print_r($data);exit;
//================违章查询==========
$params = [
    "engineNo" => "XXXXXX",//请替换为真实数据
    "plateNumber" => "浙AXXXXX",//请替换为真实数据
    "vin" => "XXXXXXXX",//请替换为真实数据
    "phone" => "XXXXXXXXXXX",//请替换为真实数据
    "city" => "XXXXX",//请替换为真实数据
];
//$data = $ddyc->getViolationQuery($params);
//print_r($data);exit;
//================查询违章及费用==========
$params = [
    "engineNo" => "XXXXXX",
    "plateNumber" => "浙AXXXXX",
    "vin" => "XXXXXXXX",
    "phone" => "XXXXXXXXXXX",
    "city" => "XXXXX"];
//$data = $ddyc->getViolationQueryNeedFee($params);
//print_r($data);exit;
//================获取token==============
$params = [
    "engineNo" => "XXXXXX",
    "plateNumber" => "浙AXXXXX",
    "vin" => "XXXXX",
    "phone" => "XXXXXXXXXXX",
];

//$data = $ddyc->getViolationAssignToken($params);
//print_r($data);exit;
//================创建代缴订单==============
$params = [
    "violationCodes" => ["XXX"],//违章记录唯一编码，查询出违章的每一个 code
    "totalPrice" => "500",//代办总金额（罚款金额+服务费）
    "outOrderNo" => 11111,//第三方订单流水号
    "lng" => 132.123213,//下单时用户所在地经度
    "lat" => 24.325185,//下单时用户所在地维度
    "token" => "xxxxxx",];//用户身份标识  getViolationAssignToken方法可获取
//$data = $ddyc->getViolationCreateOrder($params);
//print_r($data);exit;
//=================查询订单状态=================
$params = [
    "token" => "xxxxx",
    "orderId" => 123456,
];
//$data = $ddyc->getViolationOrderStatus($params);
//print_r($data);exit;