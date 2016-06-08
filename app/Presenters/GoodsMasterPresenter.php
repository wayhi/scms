<?php

namespace App\Presenters;

use McCool\LaravelAutoPresenter\BasePresenter;

/**
 * This is the shop presenter class.
 *
 * @author J.W
 */

class GoodsMasterPresenter extends BasePresenter
{
    
	public function activated_text()
	{

		$activated = $this->getWrappedObject()->activated;
		if($activated==1){
			return '是';
		}else{
			return '否';
		}
	}

	public function type_text()
	{

		$type = $this->getWrappedObject()->type;
		if($type==1){
			return '消费金融';
		}elseif($type==2){
			return '信用贷款';
		}else{
			return 'N/A';
		}
	}
    
    public function platformapprove_text()
	{

		$approve = $this->getWrappedObject()->platform_approve;
		if($approve==1){
			return '是';
		}elseif($approve==0){
			return '否';
		}else{
			return 'N/A';
		}
	}

	public function blocked_on_creation_text()
	{

		$block = $this->getWrappedObject()->blocked_on_creation;
		if($block==1){
			return '是';
		}elseif($block==0){
			return '否';
		}else{
			return 'N/A';
		}
	}

	public function refund_available_text()
	{

		$ra = $this->getWrappedObject()->refund_available;
		if($ra==1){
			return '是';
		}elseif($ra==0){
			return '否';
		}else{
			return 'N/A';
		}
	}

	public function repay_way_text()
	{

		$ra = $this->getWrappedObject()->repay_way;
		//0=>'无限制',1=>'信用卡预授权',2=>'银行卡代扣',3=>'线下还款'
		switch ($ra) {
			case 0:
				return '无限制';
				break;
			case 1:
				return '信用卡预授权';
				break;
			case 2:
				return '银行卡代扣';
				break;
			case 3:
				return '线下还款';
				break;		
			default:
				return '';
				break;
		}
	}

}