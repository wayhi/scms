<?php

namespace App\Models\Relations;

/**
 * This is the has many bank cards trait.
 *
 * @author J.W
 */
trait BelongsToBankCardTrait
{
    
    public function bankcard()
    {
        return $this->BelongsTo('App\Models\BankCard');
    }


}
