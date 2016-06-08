<?php
header ( 'Content-type:text/html;charset=utf-8' );
include_once $_SERVER ['DOCUMENT_ROOT'] . '/upacp_demo_dg/sdk/acp_service.php';

/**
 * 重要：联调测试时请仔细阅读注释！
 *
 * 产品：订购产品<br>
 * 交易：实名认证：前台交易<br>
 * 日期： 2015-09<br>
 * 版本： 1.0.0
 * 版权： 中国银联<br>
 * 说明：以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己需要，按照技术文档编写。该代码仅供参考，不提供编码性能规范性等方面的保障<br>
 * 该接口参考文档位置：open.unionpay.com帮助中心 下载  产品接口规范  《订购产品接口规范》<br>
 *              《平台接入接口规范-第5部分-附录》（内包含应答码接口规范）<br>
 * 测试过程中的如果遇到疑问或问题您可以：1）优先在open平台中查找答案：
 * 							        调试过程中的问题或其他问题请在 https://open.unionpay.com/ajweb/help/faq/list 帮助中心 FAQ 搜索解决方案
 *                             测试过程中产生的6位应答码问题疑问请在https://open.unionpay.com/ajweb/help/respCode/respCodeList 输入应答码搜索解决方案
 *                          2） 咨询在线人工支持： open.unionpay.com注册一个用户并登陆在右上角点击“在线客服”，咨询人工QQ测试支持。
 * 交易说明:前台交易，只有前台通知。
 */

//TODO 填寫卡信息
//  交易卡要素说明：
//  银联后台会做控制，如使用真实商户号，要素为根据申请表配置，请参考自己的申请表上送。

$accNo = '6226388000000095';
$customerInfo = array(
 		'phoneNo' => '18100000000', //手机号
		'certifTp' => '01', //证件类型，01-身份证
		'certifId' => '510265790128303', //证件号，15位身份证不校验尾号，18位会校验尾号，请务必在前端写好校验代码
		'customerNm' => '张三', //姓名
  		'cvn2' => '248', //cvn2
  		'expired' => '1912', //有效期，YYMM格式，持卡人卡面印的是MMYY的，请注意代码设置倒一下
);

$params = array(
		
		//以下信息非特殊情况不需要改动
		'version' => '5.0.0',                 //版本号
		'encoding' => 'utf-8',				  //编码方式
		'signMethod' => '01',	              //签名方法
		'txnType' => '72',				      //交易类型
		'txnSubType' => '01',				  //交易子类
		'bizType' => '001001',		          //业务类型
		'accessType' => '0',		          //接入类型
		'channelType' => '07',	              //渠道类型，07-PC，08-手机
		'encryptCertId' => AcpService::getEncryptCertId(), //验签证书序列号
		'frontUrl' =>  SDK_FRONT_NOTIFY_URL,  //前台通知地址
		
		//TODO 以下信息需要填写
		'merId' => $_POST["merId"],		//商户代码，请改自己的测试商户号，此处默认取demo演示页面传递的参数
		'orderId' => $_POST["orderId"],	//商户订单号，8-32位数字字母，不能含“-”或“_”，此处默认取demo演示页面传递的参数，可以自行定制规则
		'txnTime' => $_POST["txnTime"],	//订单发送时间，格式为YYYYMMDDhhmmss，取北京时间，此处默认取demo演示页面传递的参数
// 		'reqReserved' =>'透传信息',        //请求方保留域，透传字段，查询、通知、对账文件中均会原样出现，如有需要请启用并修改自己希望透传的数据

// 		'accNo' => $accNo,     //卡号，旧规范请按此方式填写
// 		'customerInfo' => AcpService::getCustomerInfo($customerInfo), //持卡人身份信息，旧规范请按此方式填写
		'accNo' => AcpService::encryptData($accNo),     //卡号，新规范请按此方式填写
		'customerInfo' => AcpService::getCustomerInfoWithEncrypt($customerInfo), //持卡人身份信息，新规范请按此方式填写
);

AcpService::sign ( $params );
$uri = SDK_FRONT_TRANS_URL;
$html_form = AcpService::createAutoFormHtml( $params, $uri );
echo $html_form;

