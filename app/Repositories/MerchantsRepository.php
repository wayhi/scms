<?php

namespace App\Repositories;

use App\Models\Merchants;
use InfyOm\Generator\Common\BaseRepository;

class MerchantsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'merchant_name'=>'like',
        'short_name'=>'like',
        'merchant_code'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Merchants::class;
    }
}
