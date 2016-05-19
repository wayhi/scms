<?php

namespace App\Repositories;

use App\Models\goods_master;
use InfyOm\Generator\Common\BaseRepository;

class goods_masterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'goods_name'=>'like',
        'merchant_id',
        'fund_product_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return goods_master::class;
    }
}
