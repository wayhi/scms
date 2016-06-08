<?php

namespace App\Models\Relations;

/**
 * This is the belongs to order trait.
 *
 * @author J.W
 */
trait BelongsToOrderTrait
{
    
    public function order()
    {
        return $this->BelongsTo('App\Models\order');
    }


}
