<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Relations\BelongsToOrderTrait;
use App\Models\Relations\BelongsToShopTrait;
use App\Models\Relations\BelongsToFundProductTrait;
use McCool\LaravelAutoPresenter\HasPresenter;
use App\Presenters\PayablePresenter;

/**
 * @SWG\Definition(
 *      definition="payable",
 *      required={amount_scheduled},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="pd_scheduled",
 *          description="pd_scheduled",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="pd_actual",
 *          description="pd_actual",
 *          type="string",
 *          format="date"
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
class payable extends Model implements HasPresenter
{
    use SoftDeletes,BelongsToOrderTrait, BelongsToShopTrait,BelongsToFundProductTrait;

    public $table = 'payables';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'order_id',
        'type',
        'shop_id',
        'goods_id',
        'fund_product_id',
        'amount_scheduled',
        'amount_actual',
        'adjustment_amount',
        'serial_no',
        'voucher_no',
        'pd_scheduled',
        'pd_actual',
        'handled_by',
        'ip_address',
        'memo',
        'status'
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
        'amount_scheduled' => 'numeric',
        'amount_actual' => 'numeric',
        'adjustment_amount' => 'numeric',
        'serial_no' => 'numeric|max:120',
        'voucher_no'=> 'max:255',
        'pd_scheduled' => 'date',
        'pd_actual' => 'date',
        'handled_by' => 'max:255',
        'ip_address' => 'ip',
        'memo' => 'max:255'
    ];

    public function getPresenterClass()
    {
        return PayablePresenter::class;
    }
}
