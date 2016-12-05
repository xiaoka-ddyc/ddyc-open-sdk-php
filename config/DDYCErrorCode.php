<?php

/**
 * Created by DianDianYangChe.
 * Auther: taotao
 * Date: 2016/12/2
 * Time: 19:29
 * copyright DianDianYangChe
 * description:
 */
class DDYCErrorCode
{
    private static $errcodes = [
        0 => '',
        //参数相关
        1001 => '必传参数缺失',
    ];

    /**
     * @param $code
     * @return mixed|string
     * 获取errorCode对应的msg
     */
    public static function getErrCode($code)
    {
        if (!isset(self::$errcodes[$code]))
            return '';
        return self::$errcodes[$code];
    }
}