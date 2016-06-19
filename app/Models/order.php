<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Relations\BelongsToCustomerTrait;
use App\Models\Relations\BelongsToGoodsMasterTrait;
use App\Models\Relations\BelongsToShopTrait;
use App\Models\Relations\BelongsToBankCardTrait;
use Carbon\Carbon;
use McCool\LaravelAutoPresenter\HasPresenter;
use App\Presenters\OrderPresenter;
/**
 * @SWG\Definition(
 *      definition="order",
 *      required={customer_id},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="effective_date",
 *          description="effective_date",
 *          type="string",
 *          format="date-time"
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
class order extends Model implements HasPresenter
{
    use SoftDeletes,BelongsToCustomerTrait,BelongsToGoodsMasterTrait,BelongsToShopTrait,BelongsToBankCardTrait;

    public $table = 'orders';
    

    protected $dates = ['created_at','updated_at','deleted_at'];

    public $fillable = [
        'order_number',
        'agent',
        'shop_id',
        'customer_id',
        'bankcard_id',
        'goods_id',
        'terminal_type',
        'currency',
        'apply_amount',
        'credit_given',
        'platform_payout',
        'downpayment_amount',
        'repay_target',
        'repay_actual',
        'handling_fees',
        'bank_charges',
        'refund_amount',
        'adjustment_amount',
        'process_status',
        'fund_status',
        'risk_level',
        'goods_info',
        'supporting_docs',
        'effective_date',
        'memo',
        'modified_by',
        'ip_address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'order_number' => 'alpha_num|unique:orders',
        'shop_id' => 'numeric|required',
        'customer_id' => 'sometimes|numeric|required',
        'bankcard_id' => 'numeric',
        'goods_id' => 'sometimes|numeric|required',
        'apply_amount' => 'numeric',
        'credit_amount' => 'numeric',
        'platform_payout' => 'numeric',
        'downpayment_amount' => 'numeric',
        'repay_target' => 'numeric',
        'repay_actual' => 'numeric',
        'handling_fees' => 'numeric',
        'bank_charges' => 'numeric',
        'refund_amount' => 'numeric',
        'adjustment_amount' => 'numeric',
        'process_status' => 'numeric',
        'fund_status' => 'numeric',
        'risk_level' => 'numeric',
        'memo' => 'max:255',
        'modified_by' => 'max:255',
        'ip_address' => 'max:255'
    ];

    
    
    public function getEffectiveDateAttribute($value)
    {
        if(Carbon::parse($value)->year<1970){
            return "";
        }else{
            return Carbon::parse($value)->toDateString(); 
        }
         

    }
    
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->toDateString(); 

    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->toDateString(); 

    }

    public function getPresenterClass()
    {
        return OrderPresenter::class;
    }
}
