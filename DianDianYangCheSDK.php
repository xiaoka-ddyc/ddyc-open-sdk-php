<?php
/**
 * Created by DianDianYangChe.
 * Auther: taotao
 * Date: 2016/12/2
 * Time: 16:00
 * copyright DianDianYangChe
 * description:总入口文件
 */
define('DDYC_PATH', __DIR__);
require_once DDYC_PATH . '/config/DDYCParams.php';
require_once DDYC_PATH . '/config/DDYCApi.php';
require_once DDYC_PATH . '/config/DDYCErrorCode.php';

class DianDianYangCheSDK
{
    private $params;//入参
    private $returnType = 'JSON';//以JSON方式返回
    private $allowReturnType = ['JSON', 'ARRAY'];//允许的返回类型

    /**
     * @param array $params
     * @return string
     * 违章查询条件
     * 接口说明：获取当前支持哪些城市及对应城市的查询条件，此接口返回的城市都经过典典严格筛选及验证。
     * 参数 无
     */
    public function getViolationCondition(array $params = [])
    {
        $type = 'violationCondition';
        return $this->getData($type, $params);
    }

    /**
     * @param array $params
     * @return string
     * 违章查询条件【带省份】
     * 接口说明：获取当前支持城市及对应城市的查询条件，支撑城市典典养车支持的并且对合作方开放的城市，开放哪些城市合作方可以和典典商务人员确认。
     * 请求参数 无
     */
    public function getViolationConditionAll(array $params = [])
    {
        $type = 'violationConditionAll';
        return $this->getData($type, $params);
    }

    /**
     * @param array $params
     * @return string
     * 违章查询
     * 接口说明：关于查询城市，指查询方希望以哪个城市的查询结果为主，因为各地法规不一致以及接口不同步问题，不同城市返回的数据不完全一致。
     * 请求参数     类型         必填            描述
     * plateNumber    string    是    车牌号
     * vin    string    否    车架号，长度要求参考各城市要求，从【违章查询条件】接口获取
     * engineNo    string    否    发动机号，长度要求参考各城市要求，从【违章查询条件】接口获取
     * phone    string    否    手机号码，根据合作类型可能会要求必填，注意：一个手机号最多查3辆车！浙江车牌手机号必填
     * city    string    否    查询哪个城市的数据，如果不传则取车牌所在城市数据，传了不会再取车牌所在地数据
     */
    public function getViolationQuery(array $params = [])
    {
        $type = 'violationQuery';
        return $this->getData($type, $params);
    }

    /**
     * @param array $params
     * @return string
     * 查询违章及费用
     * 接口说明：关于查询城市，指查询方希望以哪个城市的查询结果为主，因为各地法规不一致以及接口不同步问题，不同城市返回的数据不完全一致。
     * 请求参数     类型         必填            描述
     * plateNumber    string    是    车牌号
     * vin    string    否    车架号，长度要求参考各城市要求，从【违章查询条件】接口获取
     * engineNo    string    否    发动机号，长度要求参考各城市要求，从【违章查询条件】接口获取
     * phone    string    否    手机号码，根据合作类型可能会要求必填，注意：一个手机号最多查3辆车！浙江车牌手机号必填
     * city    string    否    查询哪个城市的数据，如果不传则取车牌所在城市数据，传了不会再取车牌所在地数据
     * needFee    boolean    否    是否需要返回服务费用，默认false,需要返回服务费则传入true；但是合作类型如果只是查询，则传入true也不会返回
     */
    public function getViolationQueryNeedFee(array $params = [])
    {
        $type = 'violationQueryNeedFee';
        return $this->getData($type, $params);
    }

    /**
     * @param array $params
     * @return string
     * 获取token
     * 接口说明：如果用户在查询接口没有输入手机号，则可以通过此接口获得token，调用此接口不会产生计费。
     * 请求参数： 参数名    类型    必填        描述
     * phone    string    是    手机号码，注意：一个手机号最多查3辆车！另外，必须传递真实号码。
     * plateNumber    string    是    车牌号
     * vin    string    否    车架号，长度要求参考各城市要求，从【违章查询条件】接口获取
     * engineNo    string    否    发动机号，长度要求参考各城市要求，从【违章查询条件】接口获取
     */
    public function getViolationAssignToken(array $params = [])
    {
        $type = 'violationAssignToken';

        return $this->getData($type, $params);
    }

    /**
     * @param array $params
     * @return string
     * 创建代缴订单
     * 接口说明：根据违章查询的参数来创建订单，不支持批量创建。
     * 请求参数： 参数名    类型    必填    描述
     * violationCodes    array-string    是    违章记录唯一编码，查询出违章的每一个 code
     * totalPrice    string    是    代办总金额（罚款金额+服务费）
     * lng    float    是    下单时用户所在地经度
     * lat    float    是    下单时用户所在地维度
     * outOrderNo    string    是    第三方订单流水号
     * token    string    是    用户身份标识
     */
    public function getViolationCreateOrder(array $params = [])
    {
        $type = 'violationCreateOrder';
        return $this->getData($type, $params);
    }

    /**
     * @param array $params
     * @return string
     * 查询订单状态
     * 接口说明：根据订单编号查询对应的订单状态。
     * 请求参数： 参数名    类型    必填    描述
     * token    string    是    用户身份标识
     * orderId    int    是    订单编号
     */
    public function getViolationOrderStatus(array $params = [])
    {
        $type = 'violationOrderStatus';
        return $this->getData($type, $params);
    }

    /**
     * @param array $params
     * @return string
     * 查询代缴订单详情
     * 接口说明：根据典典返回的订单ID查询订单详情
     * 请求参数：
     * 参数名    类型    必填    描述
     * token    string    是    用户身份标识
     * orderId    int    是    订单编号
     */
    public function getViolationOrderDetail(array $params = [])
    {
        $type = 'violationOrderDetail';
        return $this->getData($type, $params);
    }

    /**
     * @param $type
     * 设置返回的类型
     * @return bool
     */
    public function setReturnType($type)
    {
        if (in_array($type, $this->allowReturnType)) {
            $this->returnType = $type;
            return true;
        }
        return false;
    }

    /**
     * @return string
     * 返回设置的返回类型
     */
    public function getReturnType()
    {
        return $this->returnType;
    }

    /**
     * @param $type
     * @param $params
     * @return string
     */
    private function getData($type, $params)
    {
        $this->_setParams($type, $params);
        return $this->getDataFromDDYC($type);
    }

    /**
     * @param $type
     * @return string
     */
    private function getDataFromDDYC($type)
    {
        list($data, $err)  = $this->_curl($type);
        if($err !== false){
            // TODO  可以根据自己需求 选择进行日志上报或者其他
            return array(array(), false, 'query error');
        }
        return $this->formatData($data);
    }

    /**
     * 格式化数据
     * @param $data
     * @return string
     */
    private function formatData($data)
    {
        switch ($this->returnType) {
            case 'JSON':
                return json_encode($data);
            case 'ARRAY':
                return $data;
            default :
                return $data;
        }
    }

    private function _curl($type, $headers = array('Content-type: application/json;charset="utf-8"'))
    {
        $api = DDYCApi::getApi(lcfirst($type));
        $url = DDYC_BASE_URL . $api['url'];
        if ($api['method'] == 'GET') {
            $postData = '';
            $url .= '?' . http_build_query($this->params);
        } else {
            $postData = json_encode($this->params);
        }
        $url = $this->initUrl($url, $postData);

        $oCurl = curl_init();

        if (!empty($headers)) {
            curl_setopt($oCurl, CURLOPT_HTTPHEADER, $headers);
        }
        if (strtoupper($api['method']) == 'POST') {
            curl_setopt($oCurl, CURLOPT_POST, true);
            curl_setopt($oCurl, CURLOPT_POSTFIELDS, $postData);
        }
        curl_setopt($oCurl, CURLOPT_URL, $url);
        curl_setopt($oCurl, CURLOPT_TIMEOUT, DDYC_TIMEOUT);
        curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
        unset($this->params);
        $sContent = curl_exec($oCurl);
        $curl_error = false;
        if (false === $sContent) {
            $curl_error = curl_error($oCurl);
        }
        curl_close($oCurl);
        return array($sContent, $curl_error);
    }

    /**
     * @param $url
     * @param string $postData
     * @return string 通过算法 获得带签名的URL
     * 通过算法 获得带签名的URL
     */
    private function initUrl($url, $postData = '')
    {
        list($url, $urlParam) = explode('?', $url);
        $urlParam .= (empty($urlParam) ? '' : '&') . http_build_query(array(
                'app_key' => DDYC_APP_KEY,
                'timestamp' => 1480938891//time()
            ));
        $param = explode('&', $urlParam);
        sort($param);
        $urlParam = implode("&", $param);
        $sign = strtoupper(md5(strrev(DDYC_APP_KEY . DDYC_APP_SECRET . $urlParam . $postData)));
        return $url . "?" . $urlParam . '&sign=' . $sign;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param $type
     * @param $paramsData
     * @return array
     */
    private function _setParams($type, $paramsData)
    {
        $paramsArr = DDYCParams::getParams($type);
        $this->_checkParams($paramsArr, $paramsData);
        $this->_setParams0($paramsArr, $paramsData);
    }

    /**
     * @param $paramsArr
     * @param $paramsData
     * 设置 全局params
     */
    private function _setParams0($paramsArr, $paramsData)
    {
        $params = [];
        if (!empty($paramsArr['must'])) {
            foreach ($paramsArr['must'] as $needKey) {
                $params[$needKey] = $paramsData[$needKey];
            }
        }
        if (!empty($paramsArr['normal'])) {
            foreach ($paramsArr['normal'] as $normalKey) {
                if (isset($paramsData[$normalKey]) && $paramsData[$normalKey] !== null && $paramsData[$normalKey] != '') {
                    $params[$normalKey] = $paramsData[$normalKey];
                }
            }
        }
        $this->params = $params;
    }

    /**
     * @param $paramsArr
     * @param $paramsData
     * @return bool
     */
    private function _checkParams($paramsArr, $paramsData)
    {
        if (empty($paramsArr['must'])) {
            return [];
        }

        if (empty($paramsData)) {
            $this->_errorExitFormat($paramsArr['must'], 1001);
        }

        foreach ($paramsArr['must'] as $key) {
            if (empty($paramsData[$key])) {
                $this->_errorExitFormat($key, 1001);
            }
        }
        return true;
    }


    private function _successExitFormat($data = [], $code = 0, $exit = false)
    {
        return $this->_exitFormat(true, $code, $data, $exit);
    }

    private function _errorExitFormat($data = [], $code, $exit = false)
    {
        return $this->_exitFormat(false, $code, $data, $exit);
    }

    private function _exitFormat($status, $code, $data = array(), $exit = false)
    {
//        header('Content-Type:application/json; charset=utf-8');
        $code = strval($code);
        $msg = DDYCErrorCode::getErrCode($code);
        $data = ['success' => $status, 'errCode' => $code, 'message' => $msg, 'data' => $data];
        if ($exit) {
            echo json_encode($data);
            exit;
        } else {
            return $data;
        }
    }

}
