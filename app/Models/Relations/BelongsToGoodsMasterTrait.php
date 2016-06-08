<?php

namespace App\Models\Relations;

/**
 * This is the belongs to goods trait.
 *
 * @author J.W
 */
trait BelongsToGoodsMasterTrait
{
    
    public function goods()
    {
        return $this->BelongsTo('App\Models\goods_master','goods_id','id');
    }


}
