<?php

namespace App\Models\Relations;

/**
 * This is the belongs to customer trait.
 *
 * @author J.W
 */
trait BelongsToCustomerTrait
{
    
    public function customer()
    {
        return $this->BelongsTo('App\Models\Customer');
    }


}
