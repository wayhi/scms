<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\shops;
use Entrust;
class CreateshopsRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Entrust::can(['merchant_creator','admin','owner'])){
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
        return shops::$rules;
    }
}
