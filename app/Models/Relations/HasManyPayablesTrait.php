<?php

namespace App\Models\Relations;

/**
 * This is the has many payables trait.
 *
 * @author J.W
 */
trait HasManyPayablesTrait
{
    
    public function payables()
    {
        return $this->HasMany('App\Models\payable');
    }


}
