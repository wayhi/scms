<?php

use App\Models\Customer;
use App\Models\BankCard;
use App\Models\Shops;
use App\Models\Goods_master;
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
Route::get('/getoss/{file_type}',['as'=>'getoss','uses'=>'API\\OSSController@getoss']);
Route::get('/getosscallback/{file_type}',['as'=>'getosscallback','uses'=>'API\\OSSController@getosscallback']);
Route::match(['get','post'],'/callback',['as'=>'callback','uses'=>'API\\OSSController@callback']);
Route::group(['middleware' => ['web','auth']], function () {
    //Route::auth();
	Route::get('/home', ['as'=>'home','uses'=>'HomeController@index']);
    Route::resource('admin/roles', 'Admin\\RoleController');
    Route::get('/sms/start',['middleware'=>'auth','as'=>'sms.start','uses'=>'SmsController@start']);
    Route::resource('sms', 'SmsController');
    Route::get('/customer/edit/{id}/{bankcard_id}',['middleware'=>'auth',function($id,$bankcard_id){
            return CustomerController::bankcard_store($id,$bankcard_id);
    }]);
    Route::match(['get','post'],'/customers/search/{search_term?}',['as'=>'customers.search',
        'uses'=>'Customer\\CustomerController@search']);

    Route::resource('customers', 'Customer\\CustomerController');
    Route::post('customers/add_bankcard',['middleware'=>'auth','as'=>'customers.addbankcard','uses'=>'Customer\\CustomerController@bankcard_store']);
    Route::get('mobile_search',['middleware'=>'auth',function(Request $request){
            return Customer::where('mobile_phone','like',$request->get('term').'%')->where('activated','=',1)
            ->take(10)->lists('mobile_phone');
                }]);
    Route::get('name_search',['middleware'=>'auth',function(Request $request){
            return Customer::where('mobile_phone',$request->get('term'))->where('activated','=',1)
            ->select('id','name')->get()->toJson();
                }]);
    Route::get('customer_search',['middleware'=>'auth',function(Request $request){
            return Customer::where('name','like',$request->get('q').'%')->where('activated','=',1)
            ->select(DB::raw("id,concat(`name`,'(',`mobile_phone`,')') as text"))->paginate(10)->toJson();
                }]);
    Route::get('bankcard_search/{customer_id}',['middleware'=>'auth',function($customer_id){
            return BankCard::where('customer_id',$customer_id)->where('activated','=',1)
            ->select(DB::raw("id,concat(`bin`,'******',right(`code`,4)) as bincode"))->get()->toJson();
                }]);
    Route::get('shop_search/{goods_id}',['middleware'=>'auth',function($goods_id){
            return Shops::where('merchant_id','=',Goods_master::where('id',$goods_id)->get()[0]['merchant_id'])->where('status','=',1)->select('id','shop_name')->get()->toJson();
                }]);
    Route::get('goods_info/{goods_id}',['middleware'=>'auth',function($goods_id){
            return Goods_master::with('supportings')->where('id',$goods_id)->get()->toJson();
                }]);
    Route::get('orders/summary_print/{id}',['middleware'=>'auth','as'=>'orders.summary_print','uses'=>'orderController@print']);
    Route::resource('funds', 'FundsController');
    Route::resource('fundproducts','FundProductController');
    Route::resource('merchants', 'MerchantsController');
    Route::resource('shops', 'ShopsController');
    Route::resource('goodsMasters', 'GoodsMasterController');
    Route::resource('orders', 'orderController');
    
    Route::get('orders_in_approval',['as'=>'oia','uses'=>'orderController@getInApproval']);
    Route::get('orders_in_funding',['as'=>'oif','uses'=>'orderController@getInFunding']);
    Route::get('orders_in_repaying',['as'=>'oir','uses'=>'orderController@getInRepaying']);
    Route::get('orders_completed',['as'=>'oc','uses'=>'orderController@getCompleted']);
    Route::get('orders_overdue',['as'=>'ood','uses'=>'orderController@getOverdue']);
    //Route::put('order_approve',['as'=>'orderapprove','uses'=>'orderController@approve']);
    Route::resource('payables', 'payableController');
    Route::resource('receivables', 'receivableController');
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
