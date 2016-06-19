<?php

namespace App\Presenters;

use McCool\LaravelAutoPresenter\BasePresenter;
use App\Presenters\CustomerPresenterTrait;


/**
 * This is the bankcard presenter class.
 *
 * @author J.W
 */

class BankCardPresenter extends BasePresenter
{
    use CustomerPresenterTrait;

    public function getCodeDisplay()
    {

    	$code = $this->getWrappedObject()->code;
    	$bin = $this->getWrappedObject()->bin;

    	return $bin.'*******'.substr($code,-4);
    }

    

}