<?php

namespace App\Models\Relations;

/**
 * This is the has many bank cards trait.
 *
 * @author J.W
 */
trait HasManyBankCardsTrait
{
    
    public function bankcards()
    {
        return $this->HasMany('App\Models\BankCard');
    }


}
