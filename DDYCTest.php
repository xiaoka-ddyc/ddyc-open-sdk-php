<?php
/**
 * Created by DianDianYangChe.
 * Auther: taotao
 * Date: 2016/12/2
 * Time: 16:06
 * copyright DianDianYangChe
 * description:
 */
require_once './DianDianYangCheSDK.php';
$ddyc = new DianDianYangCheSDK();
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
    "engineNo" => "0018835448DT",
    "plateNumber" => "浙A778QZ",
    "vin" => "SALMN1H46CA385572",
    "phone" => "10112341142",
    "city" => "杭州市"];
//$data = $ddyc->getViolationQuery($params);
//print_r($data);exit;
//================查询违章及费用==========
$params = [
    "engineNo" => "0018835448DT",
    "plateNumber" => "浙A778QZ",
    "vin" => "SALMN1H46CA385572",
    "phone" => "10112341142",
    "city" => "杭州市"];
//$data = $ddyc->getViolationQueryNeedFee($params);
//print_r($data);exit;
//================获取token==============
$params = [
    "engineNo" => "0018835448DT",
    "plateNumber" => "浙A778QZ",
    "vin" => "SALMN1H46CA385572",
    "phone" => "10112341142",
];

//$data = $ddyc->getViolationAssignToken($params);
//print_r($data);exit;
//================创建代缴订单==============
$params = [
    "violationCodes" => ["42-63836"],//违章记录唯一编码，查询出违章的每一个 code
    "totalPrice" => "500",//代办总金额（罚款金额+服务费）
    "outOrderNo" => 32343242,//第三方订单流水号
    "lng" => 132.123213,//下单时用户所在地经度
    "lat" => 24.325185,//下单时用户所在地维度
    "token" => "V0dZeXZNeFZPc2lKc1hDTUNkxVJuZz09Cg",];//用户身份标识  getViolationAssignToken方法可获取
//$data = $ddyc->getViolationCreateOrder($params);
//print_r($data);exit;
//=================查询订单状态=================
$params = [
    "token" => "V0dZeXZNeFZPc2lKc1hDTUNkxVJuZz09Cg",
    "orderId" => 123456,
];
//$data = $ddyc->getViolationOrderStatus($params);
//print_r($data);exit;