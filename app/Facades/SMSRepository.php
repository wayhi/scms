<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the role repository facade class.
 *
 * @author J.W
 */
class SMSRepository extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'smsrepository';
    }
}
