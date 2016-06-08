<?php

namespace App\Presenters;

use McCool\LaravelAutoPresenter\BasePresenter;

/**
 * This is the order presenter class.
 *
 * @author J.W
 */

class ReceivablePresenter extends BasePresenter
{
    
    
    public function type_text()
    {
        
        $value = $this->getWrappedObject()->type;
        switch ($value) {
            case 1:
                return "资金方";
                break;
            case 2:
                return "借款方";
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
                return "未支付";
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