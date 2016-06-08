<?php

namespace App\Models\Relations;

/**
 * This is the belongs to merchant trait.
 *
 * @author J.W
 */
trait BelongsToShopTrait
{
    
    public function shop()
    {
        return $this->BelongsTo('App\Models\Shops');
    }


}
