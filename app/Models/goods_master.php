<?php

namespace App\Models;

use Eloquent as Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Relations\BelongsToMerchantTrait;
use App\Models\Relations\BelongsToFundProductTrait;
use App\Models\Relations\BelongsToManySupportingTrait;
use App\Models\Relations\BelongsToRoleTrait;
use McCool\LaravelAutoPresenter\HasPresenter;
use App\Presenters\GoodsMasterPresenter;

/**
 * @SWG\Definition(
 *      definition="goods_master",
 *      required={goods_name, payout_rate},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Goods_master extends Model implements HasPresenter
{
    use SoftDeletes,BelongsToMerchantTrait,BelongsToFundProductTrait,BelongsToManySupportingTrait,BelongsToRoleTrait;

    public $table = 'goods_master';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'type',
        'goods_name',
        'goods_spec',
        'merchant_id',
        'fund_product_id',
        'platform_approve',
        'payout_rate',
        'fund_rate',
        'repay_way',
        'downpayment_rate',
        'downpayment_amount',
        'handling_fee_rate',
        'handling_fee',
        'repay_times',
        'repay_pct',
        'return_pct',
        'repay_amount',
        'order_limit',
        'supporting_ids',
        'blocked_on_creation',
        'refund_available',
        'trade_time_start',
        'trade_time_end',
        'role_id',
        'activated'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        //'trade_time_start'=>'timestamp',
        //'trade_time_end'=>'timestamp'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'goods_name' => 'required|max:50',
        'payout_rate' => 'numeric|required',
        'fund_rate'=>'numeric|required',
        'downpayment_rate' => 'numeric',
        'downpayment_amount' => 'numeric',
        'handling_fee_rate' => 'numeric',
        'handling_fee' => 'numeric',
        'repay_times' => 'numeric|max:120',
        'repay_pct' => 'numeric',
        'repay_amount' => 'numeric',
        'role_id' => 'numeric',
        'order_limit' => 'numeric'
    ];

    public function getPresenterClass()
    {
        return GoodsMasterPresenter::class;
    }

    public function setTradeTimeStartAttribute($value)
    {
        $this->attributes['trade_time_start'] = Carbon::parse($value);
    }

    public function setTradeTimeEndAttribute($value)
    {
        
        $this->attributes['trade_time_end'] = Carbon::parse($value);
       
    }

    public function getTradeTimeEndAttribute($value)
    {
        
        return Carbon::parse($value)->format('h:i:s A');
       
    }

    public function getTradeTimeStartAttribute($value)
    {
        
        return Carbon::parse($value)->format('h:i:s A');
       
    }

    
}
