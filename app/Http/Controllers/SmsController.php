<?php

namespace App\Http\Controllers;
//

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use App\Facades\SMSRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Flash,Auth,Config;
use App\Http\Controllers\REST;



class SmsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function start()
    {

        return View::make('sms.start');
    }

    public function create()
    {
        
        return View::make('sms.sms_create');
    }

    public function store(Request $request)
    {
        
        $input = $request->only(['send_to','send_to_number','template_id','customer_id','status']);
        $val = SMSRepository::validate($input, array_keys($input));
        if ($val->fails()) {
            Flash::error($val->errors());
            return Redirect::route('sms.start')->withInput();
        }

        $sms = SMSRepository::create($input); 
        $sms->operated_by = Auth::user()->email;
        $sms->save();

        if($sms->status==1){

            $send_result = $this->sendTemplateSMS($sms->send_to_number,Array($sms->send_to.'客户'),81115);
            
            if($send_result){
                Flash::success('客户 "'.$sms->send_to.'" 的短信已成功发送！');
               
            }else{
                Flash::error('客户 "'.$sms->send_to.'" 的短信发送失败！');
                $sms->status = 4;
                $sms->save();
                
            }

        }elseif($sms->status==2){
            Flash::error('客户 "'.$sms->send_to.'" 已拒绝！');
        }elseif($sms->status==3){
            Flash::warning('客户 "'.$sms->send_to.'" 没有应答！');
        }
        return Redirect::route('sms.start');
        
    }

    public function show($id)
    {

    }

    /**
  * 发送模板短信
  * @param to 手机号码集合,用英文逗号分开
  * @param datas 内容数据 格式为数组 例如：array('Marry','Alon')，如不需替换请填 null
  * @param $tempId 模板Id
  */
         
    private function sendTemplateSMS($to,$datas,$tempId)
    {
         
        


         // 初始化REST SDK
        global $accountSid,$accountToken,$appId,$serverIP,$serverPort,$softVersion;
         //主帐号
        $accountSid= Config::get('scms.sms_accountSid');

            //主帐号Token
        $accountToken= Config::get('scms.sms_accountToken');

        //应用Id
        $appId=Config::get('scms.sms_appId');

        //请求地址，格式如下，不需要写https://
        $serverIP=Config::get('scms.sms_serverIP');

        //请求端口 
        $serverPort=Config::get('scms.sms_serverPort');

        //REST版本号
        $softVersion=Config::get('scms.sms_softVersion');

        $rest = new REST($serverIP,$serverPort,$softVersion);
        $rest->setAccount($accountSid,$accountToken);
        $rest->setAppId($appId);
        
         // 发送模板短信
         //echo "Sending TemplateSMS to $to <br/>";
         $result = $rest->sendTemplateSMS($to,$datas,$tempId);
         if($result == NULL ) {
             //echo "result error!";
             //break;
            return false;
         }
         if($result->statusCode!=0) {
             //echo "error code :" . $result->statusCode . "<br>";
             //echo "error msg :" . $result->statusMsg . "<br>";
             //TODO 添加错误处理逻辑
            return false;
         }else{
             //echo "Sendind TemplateSMS success!<br/>";
             // 获取返回信息
             //$smsmessage = $result->TemplateSMS;
             //echo "dateCreated:".$smsmessage->dateCreated."<br/>";
             //echo "smsMessageSid:".$smsmessage->smsMessageSid."<br/>";
             //TODO 添加成功处理逻辑
             return true;
         }
    }
}
