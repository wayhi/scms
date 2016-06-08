<?php

namespace App\Models\Relations;

/**
 * This is the has many shops trait.
 *
 * @author J.W
 */
trait HasManyGoodsMastersTrait
{
    
    public function payables()
    {
        return $this->HasMany('App\Models\payable');
    }


}
