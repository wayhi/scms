<?php


return [

    /*
    |--------------------------------------------------------------------------
    | Site Description
    |--------------------------------------------------------------------------
    |
    | This defines the site description.
    |
    |
    */

    'description' => env('CMS_DESC', 'YFQ Management Platform'),
    

    /*
    |--------------------------------------------------------------------------
    | Role Model
    |--------------------------------------------------------------------------
    |
    | This defines the comment model to be used.
    |
    |
    */

    'role' => 'App\Models\Role',
    'permission' => 'App\Models\Permission',
    

];
