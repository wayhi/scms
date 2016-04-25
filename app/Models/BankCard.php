<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\BankCardPresenter;
use McCool\LaravelAutoPresenter\HasPresenter;
use App\Models\Relations\BelongsToCustomerTrait;

class BankCard extends Model implements HasPresenter
{
    use BelongsToCustomerTrait;

    protected $table='bankcard';

 	public static $index = [];

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
        'customer_id'   => 'required',
        'bankcard_numbers' => 'required',
    ];

    protected $guarded = ['_token', '_method', 'id'];

    public function getPresenterClass()
    {
        return BankcardPresenter::class;
    }
}
