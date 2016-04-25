<?php

namespace App\Models\Relations;

/**
 * This is the has many tags trait.
 *
 * @author J.W
 */
trait BelongsToManyTagsTrait
{
    
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
    }

    
}
