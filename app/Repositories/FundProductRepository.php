<?php

namespace App\Repositories;

use App\Models\FundProduct;
use InfyOm\Generator\Common\BaseRepository;

class FundProductRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_code',
        'product_name',
        'repay_method'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FundProduct::class;
    }
}
