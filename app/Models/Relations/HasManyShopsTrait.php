<?php

namespace App\Models\Relations;

/**
 * This is the has many shops trait.
 *
 * @author J.W
 */
trait HasManyShopsTrait
{
    
    public function shops()
    {
        return $this->HasMany('App\Models\Shops','merchant_id','id');
    }


}
