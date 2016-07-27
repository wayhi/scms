<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\order;
use Entrust;

class UpdateorderRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Entrust::can(['order_editor','admin','owner'])){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() 
    {
        if(in_array($this->action,["已放款","平台审核通过","还款完成","订单取消","拒绝"])){
            return [];
        }else{
            return order::$update_rules;
            
        }
        
    }
}
