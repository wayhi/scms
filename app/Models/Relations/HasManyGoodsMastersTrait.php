<?php

namespace App\Models\Relations;

/**
 * This is the has many goods trait.
 *
 * @author J.W
 */
trait HasManyGoodsMastersTrait
{
    
    public function goods_masters()
    {
        return $this->HasMany('App\Models\goods_master');
    }


}
