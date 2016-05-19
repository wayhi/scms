<?php

namespace App\Models\Relations;

/**
 * This is the belongs to fund trait.
 *
 * @author J.W
 */
trait BelongsToFundProductTrait
{
    
    public function fundproduct()
    {
        return $this->BelongsTo('App\Models\FundProduct','fund_product_id','id');
    }


}
