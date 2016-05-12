<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Relations\HasManyShopsTrait;
use McCool\LaravelAutoPresenter\HasPresenter;
/**
 * @SWG\Definition(
 *      definition="merchants",
 *      required={merchant_name, merchant_code},
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
class Merchants extends Model
{
    use SoftDeletes,HasManyShopsTrait;

    public $table = 'merchants';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'merchant_name',
        'short_name',
        'merchant_code',
        'address',
        'contact_person',
        'phone',
        'merchant_cert'
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
        'merchant_name' => 'required|max:50',
        'short_name' => 'max:20',
        'merchant_code' => 'required|max:50',
        'address' => 'max:100',
        'contact_person' => 'max:20',
        'phone' => 'max:50'
    ];

    public function getPresenterClass()
    {
        //return ShopPresenter::class;
    }
}
