<?php

namespace App\Repositories;

use App\Models\Supporting;
use InfyOm\Generator\Common\BaseRepository;

class SupportingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Supporting::class;
    }
}
