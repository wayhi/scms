<?php

namespace App\Models\Relations;

/**
 * This is the has many supportings trait.
 *
 * @author J.W
 */
trait BelongsToManySupportingTrait
{
    
    public function supportings()
    {
        return $this->belongsToMany('App\Models\Supporting','goods_supporting','goods_id','supporting_id');
    }


}
