<?php

namespace App\Repositories;

use App\Models\payable;
use InfyOm\Generator\Common\BaseRepository;

class PayableRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return payable::class;
    }
}
