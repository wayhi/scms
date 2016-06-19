<?php

namespace App\Repositories;

use App\Models\order;
use InfyOm\Generator\Common\BaseRepository;

class OrderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'order_number'=>'='
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return order::class;
    }
}