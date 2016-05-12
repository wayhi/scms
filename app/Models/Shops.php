<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Relations\BelongsToMerchantTrait;
use McCool\LaravelAutoPresenter\HasPresenter;
use App\Presenters\ShopPresenter;

/**
 * @SWG\Definition(
 *      definition="shops",
 *      required={shop_code, shop_name, shop_address, contact_name, account_name, bank_name, account_code},
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
class Shops extends Model implements HasPresenter
{
    use SoftDeletes,BelongsToMerchantTrait;

    public $table = 'shops';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'merchant_id',
        'shop_code',
        'shop_name',
        'shop_address',
        'contact_name',
        'line_phone',
        'mobile_phone',
        'status',
        'account_name',
        'bank_name',
        'account_code'
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
        'shop_code' => 'required|max:50',
        'shop_name' => 'required|max:50',
        'shop_address' => 'required|max:255',
        'contact_name' => 'required|max:20',
        'line_phone' => 'max:20',
        'mobile_phone' => 'max:20',
        'account_name' => 'required|max:50',
        'bank_name' => 'required|max:50',
        'account_code' => 'required|max:50'
    ];

    public function getPresenterClass()
    {
        return ShopPresenter::class;
    }
}
