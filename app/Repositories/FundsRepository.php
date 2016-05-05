<?php

namespace App\Repositories;

use App\Models\Funds;
use InfyOm\Generator\Common\BaseRepository;

class FundsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fund_code',
        'fund_name'=>'like'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Funds::class;
    }
}
