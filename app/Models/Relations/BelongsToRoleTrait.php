<?php

namespace App\Models\Relations;

/**
 * This is the belongs to role trait.
 *
 * @author J.W
 */
trait BelongsToRoleTrait
{
    
    public function role()
    {
        return $this->BelongsTo('App\Models\role');
    }


}
