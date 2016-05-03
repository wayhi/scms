<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\CustomerPresenter;
use McCool\LaravelAutoPresenter\HasPresenter;
use App\Models\Relations\BelongsToManyTagsTrait;
use App\Models\Relations\HasManyBankCardsTrait;

class Customer extends Model implements HasPresenter
{
    use BelongsToManyTagsTrait,HasManyBankCardsTrait;

    protected $table='customers';

 	public static $index = ['id', 'name','mobile_phone','activated','created_at'];

    /**
     * The max records per page when displaying a paginated index.
     *
     * @var int
     */
    public static $paginate = 10;

    /**
     * The columns to order by when displaying an index.
     *
     * @var string
     */
    public static $order = 'id';

    /**
     * The direction to order by when displaying an index.
     *
     * @var string
     */
    public static $sort = 'desc';

    /**
     * The post validation rules.
     *
     * @var array
     */

 	public static $rules = [
        'name'   => 'required|max:5',
        'mobile_phone' => 'required|digits:11',
        'wechat_account'=> 'max:255',
        'id_number' => 'alpha_num',
    ];

    protected $guarded = ['_token', '_method', 'id'];

    public function getPresenterClass()
    {
        return CustomerPresenter::class;
    }
}
