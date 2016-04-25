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
    'name' => '易分期管理平台',

    /*
    |--------------------------------------------------------------------------
    | Models definition
    |--------------------------------------------------------------------------
    |
    | This defines the model to be used.
    |
    |
    */

    'role' => 'App\Models\Role',
    'permission' => 'App\Models\Permission',
    'sms' => 'App\Models\Sms',
    'customer' => 'App\Models\Customer',
    'tag' => 'App\Models\Tag',
    'bankcard'=> 'App\Models\BankCard',

    /*
        SMS Angent Setting
    */
    'sms_accountSid' => '8a48b5514f06f404014f165709830e54',
    'sms_accountToken' =>'1eb57f77e37d4d97b978a7f384f83557',
    'sms_appId' =>'aaf98f895427cf50015428c38310026d',
    'sms_serverIP'=>'app.cloopen.com',
    'sms_serverPort'=>'8883',
    'sms_softVersion'=>'2013-12-26',
   
    

];
