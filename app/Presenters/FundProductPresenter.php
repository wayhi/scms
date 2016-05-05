<?php

namespace App\Presenters;

use McCool\LaravelAutoPresenter\BasePresenter;

/**
 * This is the fund product presenter class.
 *
 * @author J.W
 */

class FundProductPresenter extends BasePresenter
{
    
	public function credit_limit_formatted()
	{

		$credit = $this->getWrappedObject()->credit_limit;
		if($credit){
			return number_format ($credit/100,2); //原值以分为单位，显示还原为元为单位。
		}else{
			return 'N/A';
		}


	}

	public function limit_per_order_formatted()
	{

		$limit = $this->getWrappedObject()->limit_per_order;
		if($limit){
			return number_format ($limit/100,2); //原值以分为单位，显示还原为元为单位。
		}else{
			return 'N/A';
		}


	}

	public function repay_period_text()
	{
		 
		 switch ($this->getWrappedObject()->repay_period) {
		 	case 0:
		 		return '每月';
		 		break;
		 	case 1:
		 		return '每30天';
		 		break;
		 	case 2:
		 		return '每3个月';
		 		break;
		 	case 3:
		 		return '每6个月';
		 		break;			
		 	
		 	default:
		 		return 'N/A';
		 		break;
		 }

	}

	public function activated_text()
	{

		$activated = $this->getWrappedObject()->activated;
		if($activated==1){
			return '是';
		}else{
			return '否';
		}
	}

	public function repay_method_text()
	{
		$repay_method = $this->getWrappedObject()->repay_method;
		switch ($repay_method) {
			case '0':
				return '等额本息';
				break;
			case '1':
				return '先息后本';
				break;
			default:
				return 'N/A';
				break;
		}

	}
    

}