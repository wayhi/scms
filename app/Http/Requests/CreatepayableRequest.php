<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\payable;
use Entrust;

class CreatepayableRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Entrust::can(['payable_creator','admin','owner'])){
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
        return payable::$rules;
    }
}
