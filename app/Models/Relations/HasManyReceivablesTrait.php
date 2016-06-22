<?php

namespace App\Models\Relations;

/**
 * This is the has many receivables trait.
 *
 * @author J.W
 */
trait HasManyReceivablesTrait
{
    
    public function receivables()
    {
        return $this->HasMany('App\Models\receivable');
    }


}
