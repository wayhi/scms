<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supporting extends Model
{
    public $table = 'supportings';
    

    protected $dates = [];


    public $fillable = [
        'title'
    ];
}
