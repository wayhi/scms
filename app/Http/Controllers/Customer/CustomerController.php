<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Facades\CustomerRepository;
use App\Facades\BankCardRepository;
use Illuminate\Support\Facades\Redirect;
use Flash,Session,DB;
use App\Models\Tag;
use Entrust;

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
        if(!Entrust::can(['customer_viewer','admin','owner'])){
            return response()->view('errors.403');
        }
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
        if(!Entrust::can(['customer_creator','admin','owner'])){
            return response()->view('errors.403');
        }
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
        if(!Entrust::can(['customer_viewer','admin','owner'])){
            return response()->view('errors.403');
        }
        $customer = CustomerRepository::find($id);
        if($customer){
            $customer->load('tags','bankcards');
            return View::make('customers.show',['customer'=>$customer]);
        }else{

            throw new NotFoundHttpException();
        }
        
       
        //$tags = $customer->tags()->get();
        //$bankcards = $customer->bankcards();
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$bankcard = null)
    {
        //return $bankcard;
        if(!Entrust::can(['customer_editor','admin','owner'])){
            return response()->view('errors.403');
        }
        $customer = CustomerRepository::find($id);
        $customer->load('bankcards');
        $tags = Tag::all();
        $tags_selected = $customer->tags()->select('id')->get()->toArray();
        $tags_selected_ids = array_column($tags_selected,'id');
        return View::make('customers.edit',['customer'=>$customer,'tags'=>$tags,'tags_selected_ids'=>$tags_selected_ids]);
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
        
        if(!Entrust::can(['customer_editor','admin','owner'])){
            return response()->view('errors.403');
        }
        $input = $request->only(['name','mobile_phone','wechat_account','activated']);
        $val = CustomerRepository::validate($input, array_keys($input));
        if ($val->fails()) {
            Flash::error($val->errors());
            return Redirect::route('customers.edit',['id'=>$id])->withInput();
        }
        if($request->has('bkcards_toremove'))
        {
            $bkcard_ids = $request->bkcards_toremove;
            $bkcard_ids = explode(',',substr($bkcard_ids,0,strlen($bkcard_ids)-1));
            //return $bkcard_ids;
            BankCardRepository::delete($bkcard_ids);
            
        }
        $customer = CustomerRepository::find($id);
        $customer->name = $input['name'];
        $customer->mobile_phone = $input['mobile_phone'];
        $customer->gender = $request->gender;
        $customer->wechat_account = $input['wechat_account'];
        $customer->activated = $input['activated'];
        if($request->has('tag_ids')){
            $tmp_tags = $request->get('tag_ids');
            $customer->tag_ids = implode(',',$tmp_tags);
            DB::table('customer_tag')->where('customer_id',$id)->delete();
            foreach ($tmp_tags as $tag_id) {
                DB::table('customer_tag')->insert(['customer_id'=>$id,'tag_id'=>$tag_id]);
            }

        }else{
            $customer->tag_ids ='';
            DB::table('customer_tag')->where('customer_id',$id)->delete();
        }
        $customer->save();
        
        if($request->get('save')=='withoutCard'){
            Flash::success('客户 "'.$customer->name.'" 的信息已成功更新！');
            return Redirect::route('customers.index');
        }elseif($request->get('save')=='withCard'){
            return View::make('customers.bankcard',['customer_id'=>$customer->id,'name'=>$customer->name]);
        }


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
        if(!Entrust::can(['customer_creator','customer_editor','admin','owner'])){
            return response()->view('errors.403');
        }
        $input = $request->only(['customer_id','bin','code','cvn2','vaild_period','contact_phone','memo']);
        
        
        $val = BankCardRepository::validate($input, array_keys($input));
        if ($val->fails()) {
            Flash::error($val->errors());
            return Redirect::route('customers.edit',['id'=>$request->get('customer_id')])->withInput();
        }

        $bankcard = BankCardRepository::create($input);

        Flash::success('客户 '.$request->customer_name.' 的银行卡 "'.$bankcard->code.'" 已成功添加。');
        return Redirect::route('customers.index');
        
        
    }

    public function search(Request $request,$search_term='')
    {
        if(!Entrust::can(['customer_viewer','admin','owner'])){
            return response()->view('errors.403');
        }
        
        if($search_term==''){
            $search_term = $request->table_search;
        } 
      

        $results = CustomerRepository::search(['where'=>[['name','like','%'.trim($search_term).'%']],'orwhere'=>[['mobile_phone',trim($search_term)]]],$search_term);
        
        $links = CustomerRepository::searchlinks();
        return View::make('customers.search',['search_term'=>$search_term,'customers'=> $results,'links'=>$links]);


    }

}
