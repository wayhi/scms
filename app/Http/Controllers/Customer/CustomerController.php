<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Facades\CustomerRepository;
use App\Facades\BankCardRepository;
use Illuminate\Support\Facades\Redirect;
use Flash,DB;
use App\Models\Tag;

class CustomerController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = CustomerRepository::paginate();
        $links = CustomerRepository::links();
        return View::make('customers.index',['customers'=> $customers,'links'=>$links]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return View::make('customers.create',['tags'=>$tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->only(['name','mobile_phone','id_number','gender','wechat_account']);
        if($request->has('tag_ids')){
            $tmp_tags = $request->get('tag_ids');
            $input = array_add($input,'tag_ids',implode(',',$tmp_tags));
        }
        
        $val = CustomerRepository::validate($input, array_keys($input));
        if ($val->fails()) {
            Flash::error($val->errors());
            return Redirect::route('customers.create')->withInput();
        }

        $customer = CustomerRepository::create($input);
        if($request->has('tag_ids')) {
            $tag_ids = $request->input('tag_ids');
            
            foreach ($tag_ids as $tag_id) {
                DB::table('customer_tag')->insert(['customer_id'=>$customer->id,'tag_id'=>$tag_id]);
            }
        }
        if($request->get('save')=='withoutCard'){
            Flash::success('新的客户 "'.$customer->name.'" 已成功创建！');
            return Redirect::route('customers.create');
        }elseif($request->get('save')=='withCard'){
            return View::make('customers.bankcard',['customer_id'=>$customer->id,'name'=>$customer->name]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $customer = CustomerRepository::find($id);
        $customer->load('tags','bankcards');
        //$tags = $customer->tags()->get();
        //$bankcards = $customer->bankcards();
 
        return View::make('customers.show',['customer'=>$customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function bankcard_store(Request $request)
    {
        $input = $request->only(['customer_id','bin','code','cvn2','vaild_period','contact_phone','memo']);
        
        
        $val = BankCardRepository::validate($input, array_keys($input));
        if ($val->fails()) {
            Flash::error($val->errors());
            return Redirect::route('customers.edit',['id'=>$request->get('customer_id')])->withInput();
        }

        $bankcard = BankCardRepository::create($input);

        Flash::success('新的银行卡 "'.$bankcard->code.'" 已成功创建！');
        return Redirect::route('customers.index');
        
        
    }

}
