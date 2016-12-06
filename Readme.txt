1、该程序代码意在让接入方能够快速接入，其中的代码仅供参考
2、PHP 版本 >=5.3 建议5.6及以上
3、先到 ./config下的DDYCApi.php文件中 line 13-14行 设置 DDYC_APP_KEY和 DDYC_APP_SECRET
4、如果环境调通，需要上线
5、参数配置可以到 ./config/DDYCParams.php文件中查看，其中 must为必选参数，normal为可选参数
6、调用实例在DDYCTest.php去查看 测试
7、在上线的时候，请把DDYC_SDK.php中的DDYC_ENV 常量修改： TEST-》PRODUCT