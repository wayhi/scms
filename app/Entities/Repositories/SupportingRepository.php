<?php

namespace App\Entities\Repositories;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class SupportingRepository extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

}
