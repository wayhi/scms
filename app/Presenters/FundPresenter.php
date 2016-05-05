<?php

namespace App\Presenters;

use McCool\LaravelAutoPresenter\BasePresenter;

/**
 * This is the fund presenter class.
 *
 * @author J.W
 */

class FundPresenter extends BasePresenter
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

	public function activated_text()
	{

		$activated = $this->getWrappedObject()->activated;
		if($activated==1){
			return '是';
		}else{
			return '否';
		}
	}
    

}