<?php

namespace App\Presenters;

use McCool\LaravelAutoPresenter\BasePresenter;

/**
 * This is the shop presenter class.
 *
 * @author J.W
 */

class ShopPresenter extends BasePresenter
{
    
	public function status_text()
	{

		$status = $this->getWrappedObject()->status;
		if($status==1){
			return '有效';
		}elseif($status==0){
			return '无效';
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