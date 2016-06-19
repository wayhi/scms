<?php

namespace App\Presenters;

use Carbon\Carbon;

/**
 * This is the created date presenter trait.
 *
 * @author J.W
 */

Trait CustomerPresenterTrait
{
    

    public function created_at()
    {
        $created = $this->getWrappedObject()->created_at;

        if($created){
        	return Carbon::createFromFormat('Y-m-d H:i:s', $created)->toDateString();
        }else{
        	return "N/A";
        }
        
    }

    public function gender()
    {
    	$gender = $this->getWrappedObject()->gender;
    	switch ($gender) {
    		case 1:
    			return "先生";
    			break;

    		case 0:
    			return "女士";
    			break;	
    		case 2:
    			return "不详";
    			break;

    		default:
    			return "不详";
    			break;
    	}
    }

    public function name_with_link()
    {
        $name =$this->getWrappedObject()->name;
        return "<a href='".route('customers.show',$this->getWrappedObject()->id)."' target='_blank'>".$name."</a>";
    }

}