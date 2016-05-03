<?php

namespace App\Models\Relations;

/**
 * This is the has many fund products trait.
 *
 * @author J.W
 */
trait HasManyFundProductsTrait
{
    
    public function fundproducts()
    {
        return $this->HasMany('App\Models\FundProduct');
    }


}
