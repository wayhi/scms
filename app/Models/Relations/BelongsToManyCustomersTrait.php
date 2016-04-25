<?php

namespace App\Models\Relations;

/**
 * This is the has many tags trait.
 *
 * @author J.W
 */
trait BelongsToManyCustomersTrait
{
    
    public function customers()
    {
        return $this->BelongsToMany('App\Models\Customer')->withTimestamps();
    }


}
