<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Auth,Entrust;

/**
 * Class SummaryCriteria
 * @package namespace App\Criteria;
 */
class OrdersByShopCriteria implements CriteriaInterface
{
    protected $shop_ids;
    /**
     * Apply criteria in query repository
     * Criteria designed for goods_master filting depends on user role;
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        if(!Entrust::hasRole(['yfq_operator','admin','owner'])){
          if(!empty($this->shop_ids)){
            return $model->whereIn('shop_id',$this->shop_ids);
          }else{

            $this->shop_ids=empty(Auth::user()->merchant()->first())?[]:Auth::user()->merchant()->first()->shops()->lists('id');
            return $model->whereIn('shop_id',$this->shop_ids);
          }
          
        }
        
        return $model;
    }

    public function setShopIDs($ids)
    {
      $this->shop_ids = $ids;
    }
    

    
}
