<?php 

namespace App\Models;

use Zizaco\Entrust\EntrustRole;
use McCool\LaravelAutoPresenter\HasPresenter;

class Role extends EntrustRole
{

 protected $table='roles';

 public static $index = ['id', 'name', 'display_name'];

    /**
     * The max records per page when displaying a paginated index.
     *
     * @var int
     */
    public static $paginate = 8;

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
        'name'   => 'required',
        'display_name' => 'required',
    ];

    protected $guarded = ['_token', '_method', 'id'];


}



