<?php

namespace App\Repositories;

use App\Models\receivable;
use InfyOm\Generator\Common\BaseRepository;

class ReceivableRepository extends BaseRepository
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
        return receivable::class;
    }
}
