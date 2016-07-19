<?php

namespace App\Models\Relations;

/**
 * This is the has many shops trait.
 *
 * @author J.W
 */
trait HasManyShopsThroughTrait
{
    
    public function shops()
    {
        return $this->HasManyThrough('App\Models\Shops','App\Models\Merchants');
    }


}
