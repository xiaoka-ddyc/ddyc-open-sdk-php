<?php

/**
 * Created by DianDianYangChe.
 * Auther: taotao
 * Date: 2016/12/2
 * Time: 16:44
 * copyright DianDianYangChe
 * description:
 */
define('DDYC_TIMEOUT', 15);
define('DDYC_APP_KEY', '');//TODO 填上向典典养车申请的APP_KEY
define('DDYC_APP_SECRET', '');//TODO 填上向典典养车申请的APP_SECRET
class DDYC_API
{
    private static $apis = [
        //违章查询条件
        'violationCondition' => [
            'url' => '/violation/condition/all/1.0',
            'method' => 'GET',],
        //违章查询条件【带省份】
        'violationConditionAll' => [
            'url' => '/violation/condition/all/1.0',
            'method' => 'GET',],
        //违章查询
        'violationQuery' => [
            'url' => '/violation/query/1.0',
            'method' => 'POST',
        ],
        //查询违章及费用
        'violationQueryNeedFee' => [
            'url' => '/violation/query/1.0',
            'method' => 'POST',
        ],
        //获取token
        'violationAssignToken' => [
            'url' => '/violation/assign/token',
            'method' => 'POST',
        ],
        //创建代缴订单
        'violationCreateOrder' => [
            'url' => '/violation/create/order',
            'method' => 'POST',
        ],
        //查询订单状态
        'violationOrderStatus' => [
            'url' => '/violation/order/status',
            'method' => 'GET',
        ],
        //查询代缴订单详情
        'violationOrderDetail' => [
            'url' => '/violation/order/detail',
            'method' => 'GET',
        ],
    ];

    /**
     * @param $type
     * @return bool|mixed
     */
    public static function getApi($type)
    {
        if (!isset(self::$apis[$type])) {
            return false;
        }
        return self::$apis[$type];
    }
}