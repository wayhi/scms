<?php

namespace App\Repositories;

use App\Models\order;
use InfyOm\Generator\Common\BaseRepository;
//use Prettus\Repository\Contracts\CacheableInterface;
//use Prettus\Repository\Traits\CacheableRepository;

class OrderRepository extends BaseRepository 
{
    //use CacheableRepository;
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'order_number'=>'=',
        'process_status'=>'=',
        'fund_status'=>'=',
        'goods_info'=>'like',
        'effective_date'

    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return order::class;
    }
}
