<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    protected $table='message_queue';

 	public static $index = ['id', 'send_to', 'send_to_number'];

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
        'send_to'   => 'required',
        'send_to_number' => 'required|digits:11',
    ];

    protected $guarded = ['_token', '_method', 'id'];
}
