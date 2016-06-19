<?php

namespace App\Models\Relations;

/**
 * This is the belongs to merchant trait.
 *
 * @author J.W
 */
trait BelongsToMerchantTrait
{
    
    public function merchant()
    {
        return $this->BelongsTo('App\Models\Merchants','merchant_id','id');
    }


}
