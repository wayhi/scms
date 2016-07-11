<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\order;

class UpdateorderRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
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
            return order::$rules;
            
        }
        
    }
}
