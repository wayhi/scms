<?php

use App\Models\Customer;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::match(['get','post'], '/', function () {
     
     return Redirect::to('/home');

});


Route::group(['middleware' => ['web']], function () {
    Route::auth();
	Route::get('/home', ['as'=>'home','use'=>'HomeController@index']);
    Route::resource('admin/roles', 'Admin\\RoleController');
    Route::get('/sms/start',['middleware'=>'auth','as'=>'sms.start','uses'=>'SmsController@start']);
    Route::resource('sms', 'SmsController');


    Route::get('mobile_search',['middleware'=>'auth',function(Request $request){
            return Customer::where('mobile_phone','like',$request->get('term').'%')->where('activated','=',1)
            ->take(10)->lists('mobile_phone');
                }]);
    Route::get('name_search',['middleware'=>'auth',function(Request $request){
            return Customer::where('mobile_phone',$request->get('term'))->where('activated','=',1)
            ->select('id','name')->get()->toJson();
                }]);
    
});


/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });
});
