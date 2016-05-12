<?php

namespace App\Repositories;

use App\Models\Shops;
use InfyOm\Generator\Common\BaseRepository;

class ShopsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'shop_code',
        'shop_name'=>'like'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Shops::class;
    }
}
