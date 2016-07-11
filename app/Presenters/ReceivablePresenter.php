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
                return "应收资金方";
                break;
            case 2:
                return "分期缴款";
                break;
            case 3:
                return "服务费";
                break; 
            case 4:
                return "预缴款";
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
                return "逾期";
                break;              
            default:
                return "";
                break;
        }
       
    }

    public function serial_no_with_link()
    {
        $vid = $this->getWrappedObject()->id;
        $v = $this->getWrappedObject()->serial_no;

        return "<a href='".route('receivables.show',$vid)."' target='_blank'>".$v."</a>";

    }

}