<?php

namespace App\Presenters;

use McCool\LaravelAutoPresenter\BasePresenter;

/**
 * This is the order presenter class.
 *
 * @author J.W
 */

class PayablePresenter extends BasePresenter
{
    
    
    public function type_text()
    {
        
        $value = $this->getWrappedObject()->type;
        switch ($value) {
            case 1:
                return "商户";
                break;
            case 2:
                return "资金方";
                break;                         
            default:
                return "";
                break;
        }
       
    }

    public function status_text()
    {
        
        $value = $this->getWrappedObject()->status;
        switch ($value) {
            
            case 0:
                return "未处理";
                break;
            case 1:
                return "处理中";
                break;
            case 2:
                return "已支付";
                break; 
            case 3:
                return "支付失败";
                break;              
            default:
                return "";
                break;
        }
       
    }

}