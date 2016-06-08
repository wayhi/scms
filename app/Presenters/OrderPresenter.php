<?php

namespace App\Presenters;

use McCool\LaravelAutoPresenter\BasePresenter;

/**
 * This is the order presenter class.
 *
 * @author J.W
 */

class OrderPresenter extends BasePresenter
{
    
    
    public function fund_status_text()
    {
        
        $value = $this->getWrappedObject()->fund_status;
        switch ($value) {
            case 0:
                return "未申请";
                break;
            case 1:
                return "等待平台审核";
                break;
            case 2:
                return "等待资方审核";
                break;
            case 3:
                return "等待资方放款";
                break;
            case 4:
                return "等待平台放款";
                break;
            case 5:
                return "正常还款中";
                break;
            case 6:
                return "还款逾期";
                break; 
            case 7:
                return "坏账处理";
                break;
            case 8:
                return "还款完成";
                break;
            case 9:
            	return "拒绝放款";
            case 10:
            	return "退款中"; 	                         
            default:
                return "";
                break;
        }
       
    }

    public function process_status_text()
    {
        
        $value = $this->getWrappedObject()->process_status;
        switch ($value) {
            case 0:
                return "未提交";
                break;
            case 1:
                return "等待审核";
                break;
            case 2:
                return "等待放款";
                break;
            case 3:
                return "已放款";
                break;
            case 4:
                return "还款中";
                break;
            case 5:
                return "订单取消";
                break;
            case 6:
                return "已完成";
                break;            
            default:
                return "";
                break;
        }
       
    }

}