<?php

/**
 * Created by DianDianYangChe.
 * Auther: taotao
 * Date: 2016/12/2
 * Time: 17:08
 * copyright DianDianYangChe
 * description:
 */
class DDYC_PARAMS
{
    private static $params = [
        //违章查询条件
        'violationCondition' => [
        ],
        //违章查询条件【带省份】
        'violationConditionAll' => [
        ],
        //违章查询
        'violationQuery' => [
            'must' => [
                'plateNumber',],//	string	是	车牌号
            'normal' => [
                'vin',//	string	否	车架号，长度要求参考各城市要求，从【违章查询条件】接口获取
                'engineNo',//	string	否	发动机号，长度要求参考各城市要求，从【违章查询条件】接口获取
                'phone',//	string	否	手机号码，根据合作类型可能会要求必填，注意：一个手机号最多查3辆车！浙江车牌手机号必填
                'city',],//	string	否	查询哪个城市的数据，如果不传则取车牌所在城市数据，传了不会再取车牌所在地数据
        ],
        //查询违章及费用
        'violationQueryNeedFee' => [
            'must' => [
                'plateNumber',],//	string	是	车牌号
            'normal' => [
                'vin',//	string	否	车架号，长度要求参考各城市要求，从【违章查询条件】接口获取
                'engineNo',//	string	否	发动机号，长度要求参考各城市要求，从【违章查询条件】接口获取
                'phone',//	string	否	手机号码，根据合作要求不同渠道要求不同，注意：一个手机号最多查3辆车！另外，必须传递真实号码。
                'city',//	string	否	查询哪个城市的数据，如果不传则取车牌所在城市数据，传了不会再取车牌所在地数据
                'needFee',],//	boolean	否	是否需要返回服务费用，默认false,需要返回服务费则传入true；但是合作类型如果只是查询，则传入true也不会返回
        ],
        //获取token
        'violationAssignToken' => [
            'must' => [
                'phone',//	string	是	手机号码，注意：一个手机号最多查3辆车！另外，必须传递真实号码。
                'plateNumber',],//	string	是	车牌号
            'normal' => [
                'vin',//	string	否	车架号，长度要求参考各城市要求，从【违章查询条件】接口获取
                'engineNo',],//	string	否	发动机号，长度要求参考各城市要求，从【违章查询条件】接口获取
        ],
        //创建代缴订单
        'violationCreateOrder' => [
            'must' => [
                'violationCodes',//	array-string	是	违章记录唯一编码，查询出违章的每一个 code
                'totalPrice',//	string	是	代办总金额（罚款金额+服务费）
                'lng',//	float	是	下单时用户所在地经度
                'lat',//	float	是	下单时用户所在地维度
                'outOrderNo',//	string	是	第三方订单流水号
                'token',//	string	是	用户身份标识
            ],
            'normal' => [],
        ],
        //查询订单状态
        'violationOrderStatus' => [
            'must' => [
                'token',//	string	是	用户身份标识
                'orderId',],//	int	是	订单编号
            'normal' => [],
        ],
        //查询代缴订单详情
        'violationOrderDetail' => [
            'must' => [
                'token',//	string	是	用户身份标识
                'orderId',],//	int	是	订单编号
            'normal' => [],
        ],
    ];

    /**
     * @param $key
     * @return bool|mixed
     */
    public static function getParams($key)
    {
        $key = lcfirst($key);
        if (!isset(self::$params[$key])) {
            return false;
        }
        return self::$params[$key];
    }
}
