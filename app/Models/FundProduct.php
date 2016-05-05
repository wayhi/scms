<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Relations\BelongsToFundTrait;
use McCool\LaravelAutoPresenter\HasPresenter;
use App\Presenters\FundProductPresenter;
/**
 * @SWG\Definition(
 *      definition="FundProduct",
 *      required={product_code, product_name, fund_id, repay_times, repay_pct, clearing_acct_name, clearing_acct_bank, clearing_acct_code},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="product_code",
 *          description="product_code",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="product_name",
 *          description="product_name",
 *          type="string"
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
class FundProduct extends Model implements HasPresenter
{
    use SoftDeletes,BelongsToFundTrait;

    public $table = 'fund_product';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'product_code',
        'product_name',
        'fund_id',
        'credit_limit',
        'limit_per_order',
        'repay_method',
        'repay_times',
        'repay_period',
        'repay_pct',
        'clearing_acct_name',
        'clearing_acct_bank',
        'clearing_acct_code',
        'controller_name',
        'contact_email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'product_code' => 'string',
        'product_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_code' => 'required',
        'product_name' => 'required|max:50',
        'fund_id' => 'required',
        'repay_method' => 'max:50',
        'repay_times' => 'required|max:120',
        'repay_pct' => 'required',
        'repay_period' => 'required',
        'clearing_acct_name' => 'required|max:50',
        'clearing_acct_bank' => 'required|max:50',
        'clearing_acct_code' => 'required|max:50',
        'controller_name' => 'max:50',
        'contact_email' => 'email'
    ];

    public function getPresenterClass()
    {
        return FundProductPresenter::class;
    }
}
