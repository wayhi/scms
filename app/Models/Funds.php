<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Relations\HasManyFundProductsTrait;

/**
 * @SWG\Definition(
 *      definition="Funds",
 *      required={fund_code, fund_name},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="fund_code",
 *          description="fund_code",
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
class Funds extends Model
{
    use SoftDeletes,HasManyFundProductsTrait;

    public $table = 'funds';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'fund_code',
        'fund_name',
        'credit_limit',
        'currency',
        'contact_info',
        'activated'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fund_code' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fund_code' => 'required|max:50',
        'fund_name' => 'required|max:50',
        'credit_limit' => 'numeric',
        'contact_info' => 'max:255'
    ];
}
