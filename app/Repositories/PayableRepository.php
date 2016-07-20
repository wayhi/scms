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
        'type',
        'order.order_number'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return payable::class;
    }
}
