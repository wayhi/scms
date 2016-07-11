<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use DB;

/**
 * Class SummaryCriteria
 * @package namespace App\Criteria;
 */
class SummaryCriteria implements CriteriaInterface
{
    protected $start_date;
    protected $end_date;
    protected $merchant_id;
    protected $type;


    /**
     * Apply criteria in query repository
     * Criteria designed for Receivables Summary which has two condtions: Date & Merchant.
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->where([
            ['pd_scheduled','>=',$this->start_date],
            ['pd_scheduled','<=',$this->end_date],
            ['type','in',$this->type],
            ['status','<>',2]
            ])->whereExists(function($query){ 
                $query->select(DB::raw(1))
                      ->from('shops')
                      ->where('merchant_id',$this->merchant_id)
                      ->whereRaw('shops.id = shop_id');
            });
        return $model;
    }

    public function setMerchantID($id)
    {
        $this->merchant_id = $id;
    }

    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
    }

    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
}
