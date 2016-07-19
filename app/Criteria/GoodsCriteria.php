<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Entrust;

/**
 * Class SummaryCriteria
 * @package namespace App\Criteria;
 */
class GoodsCriteria implements CriteriaInterface
{
    protected $role_ids;
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
          return $model->whereIn('role_id',$this->role_ids);
        }
        
        return $model;
    }

    public function setRoleIds($ids)
    {
      
      $this->role_ids = $ids;

    }

    
}
