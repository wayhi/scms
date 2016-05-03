<?php

namespace App\Models\Relations;

/**
 * This is the belongs to fund trait.
 *
 * @author J.W
 */
trait BelongsToFundTrait
{
    
    public function fund()
    {
        return $this->BelongsTo('App\Models\Funds');
    }


}
