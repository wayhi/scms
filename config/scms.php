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
    'sms' => 'App\Models\Sms',
    'name' => '易分期管理平台',

    /*
        SMS Angent Setting
    */
    'sms_accountSid' => '8a48b5514f06f404014f165709830e54',
    'sms_accountToken' =>'1eb57f77e37d4d97b978a7f384f83557',
    'sms_appId' =>'8a48b5514f06f404014f165b201b0e58',
    'sms_serverIP'=>'sandboxapp.cloopen.com',
    'sms_serverPort'=>'8883',
    'sms_softVersion'=>'2013-12-26',
   
    

];
