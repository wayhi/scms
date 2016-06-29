<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateorderRequest;
use App\Http\Requests\UpdateorderRequest;
use App\Repositories\OrderRepository;
use App\Repositories\goods_masterRepository;
use App\Repositories\CustomerRepo;
use App\Repositories\PayableRepository;
use App\Repositories\ReceivableRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Carbon\Carbon;
use Auth;

class orderController extends AppBaseController
{
    /** @var  orderRepository */
    private $orderRepository;
    private $goods_masterRepo;
    private $payableRepo;
    private $receivableRepo;
    private $customerRepo;
    private $current_order;
    private $req;


    public function __construct(OrderRepository $orderRepo, goods_masterRepository $goods_masterRepo,PayableRepository $payableRepo, ReceivableRepository $receivableRepo,CustomerRepo $customerRepo)
    {
        $this->orderRepository = $orderRepo;
        $this->goods_masterRepo = $goods_masterRepo;
        $this->payableRepo = $payableRepo;
        $this->receivableRepo = $receivableRepo;
        $this->customerRepo = $customerRepo;
    }

    /**
     * Display a listing of the order.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        
            $this->orderRepository->pushCriteria(new RequestCriteria($request));
            $orders = $this->orderRepository->with(['customer','goods'])->scopeQuery(function($query){
                return $query->orderBy('updated_at','desc');
            })->paginate(10);
            $links = $orders->links();
            return view('orders.index')->with(['orders'=>$orders,'links'=>$links,'viewname'=>'所有订单']);
        
    }

    public function getInApproval(Request $request)
    {
        
        $orders = $this->orderRepository->with(['customer','goods'])->scopeQuery(function($query){
            return $query->where('process_status','1')->orderBy('updated_at','desc');
        })->paginate(10);
        $links = $orders->links();
        return view('orders.index')->with(['orders'=>$orders,'links'=>$links,'viewname'=>'待审核']);

    }

    public function getInFunding(Request $request)
    {
        
        $orders = $this->orderRepository->with(['customer','goods'])->scopeQuery(function($query){
            return $query->where('process_status','2')->orderBy('updated_at','desc');
        })->paginate(10);
        $links = $orders->links();
        return view('orders.index')->with(['orders'=>$orders,'links'=>$links,'viewname'=>'放款中']);

    }

    public function getInRepaying(Request $request)
    {
        $orders = $this->orderRepository->with(['customer','goods'])->scopeQuery(function($query){
            return $query->where('process_status','4')->orderby('updated_at','desc');
        })->paginate(10);
        $links = $orders->links();
        return view('orders.index')->with(['orders'=>$orders,'links'=>$links,'viewname'=>'还款中']);

    }

    public function getCompleted(Request $request)
    {
       $orders = $this->orderRepository->with(['customer','goods'])->scopeQuery(function($query){
            return $query->where('process_status','6')->orderBy('updated_at','desc');
        })->paginate(10);
        $links = $orders->links();
        return view('orders.index')->with(['orders'=>$orders,'links'=>$links,'viewname'=>'已完成']);
    }

    public function getOverdue(Request $request)
    {
        
        $orders = $this->orderRepository->with(['customer','goods'])->scopeQuery(function($query){
            return $query->where(['process_status'=>3,'fund_status'=>5])->orderBy('updated_at','desc'); //
        })->paginate(10);
        $links = $orders->links();
        return view('orders.index')->with(['orders'=>$orders,'links'=>$links,'viewname'=>'还款逾期']);

    }

    /**
     * Show the form for creating a new order.
     *
     * @return Response
     */
    public function create()
    {
        $goodslist = $this->goods_masterRepo->lists('goods_name','id')->toArray();
        //$goods_spec = $this->goods_masterRepo->lists('goods_spec')->toJson();
        //return $goods_spec;
        return view('orders.create')->with(['mode'=>'creating','goodslist'=>$goodslist]);
    }

    /**
     * Store a newly created order in storage.
     *
     * @param CreateorderRequest $request
     *
     * @return Response
     */
    public function store(CreateorderRequest $request)
    {
        $input = array_merge($request->all(),['modified_by'=>Auth::user()->email,'ip_address'=>$request->ip()]);
        
        $goods = $this->goods_masterRepo->findWithoutFail($input['goods_id']);
        if(empty($goods)){
            $new_creation = array_merge($input,['order_number'=>self::getOrderNumber(0),'process_status'=>1,'fund_status'=>1]);
        }else{
            $new_creation = array_merge($input,['order_number'=>self::getOrderNumber($goods->type),'process_status'=>1,'fund_status'=>1]);
            if($goods->order_limit!=0 && ($input['apply_amount']>$goods->order_limit)){
                Flash::error('订单超限额！');

                return redirect(route('orders.index'));
            }
        }
    

        $order = $this->orderRepository->create($new_creation);

        Flash::success('order saved successfully.');

        return redirect(route('orders.index'));
    }

    /**
     * Display the specified order.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $order = $this->orderRepository->with(['customer','goods','shop','bankcard','receivables','payables'])->findWithoutFail($id);

        if (empty($order)) {
            Flash::error('order not found');

            return redirect(route('orders.index'));
        }
        $times = $order->goods->repay_times; //还款次数
        $downpayment = $order->downpayment_amount;
        $adjustment = $order->adjustment_amount;
        $repay_target =$order->repay_target;
        $repay_amount = round(($repay_target-$downpayment+$adjustment)/$times,2);

        return view('orders.show')->with(compact('order','repay_amount'));
    }

    public function print($id)
    {
        
        $order = $this->orderRepository->with(['customer','goods','shop','bankcard','receivables','payables'])->findWithoutFail($id);

        if (empty($order)) {
            Flash::error('order not found');

            return redirect(route('orders.index'));
        }
        $times = $order->goods->repay_times; //还款次数
        $downpayment = $order->downpayment_amount;
        $adjustment = $order->adjustment_amount;
        $repay_target =$order->repay_target;
        $repay_amount = round(($repay_target-$downpayment+$adjustment)/$times,2);

        return view('orders.summary_print')->with(compact('order','repay_amount'));


    }

    /**
     * Show the form for editing the specified order.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $goodslist = $this->goods_masterRepo->lists('goods_name','id');
        $order = $this->orderRepository->with(['customer','goods.supportings','goods.merchant','bankcard'])->findWithoutFail($id);

        if (empty($order)) {
            Flash::error('order not found');

            return redirect(route('orders.index'));
        }

        return view('orders.edit')->with(['mode'=>'editing','order'=>$order,'goodslist'=>$goodslist]);
    }

    /**
     * Update the specified order in storage.
     *
     * @param  int              $id
     * @param UpdateorderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateorderRequest $request)
    {
        $order = $this->orderRepository->with(['customer','goods.fundproduct','shop','bankcard'])->findWithoutFail($id);
        $this->req = $request;
        if (empty($order)) {
            Flash::error('订单不存在!');
            return redirect(route('orders.index'));
        }
        $allfields = array_merge($request->all(),['modified_by'=>Auth::user()->email,'ip_address'=>$request->ip()]);
        switch ($request->action) {
            case '平台审核通过':
                $order = $this->orderRepository->update(array_merge($allfields,['process_status'=>'2','fund_status'=>'2']), $id);
                //生成资金计划
                if($this->createPayables(1,$order) && $this->createReceivables(1,$order)){
                    Flash::success('订单：'.$order->order_number.' 已核准, 进入放款流程。');
                }else{
                    Flash::error('订单：'.$order->order_number.' 内部错误，请联系管理员。');
                }
                
                return redirect(route('oia'));
                break;
            case '已放款':
                //生成资金计划
                $order = $this->orderRepository->update(array_merge($allfields,['process_status'=>'4','fund_status'=>'5']), $id);
                if($this->createPayables(2,$order) && $this->createReceivables(2,$order)){
                    Flash::success('订单：'.$order->order_number.' 已完成放款，进入还款流程。');
                }else{
                    Flash::error('订单：'.$order->order_number.' 内部错误，请联系管理员。');
                }
                return redirect(route('oif'));
                break;
            case '还款完成':
                $order = $this->orderRepository->update(array_merge($allfields,['process_status'=>'6','fund_status'=>'8']), $id);
                Flash::success('订单：'.$order->order_number.' 已完成。');
                return redirect(route('oir'));
                break;
            case '订单取消':
                $order = $this->orderRepository->update(array_merge($allfields,['process_status'=>'5']), $id);
                Flash::success('订单：'.$order->order_number.' 已取消。');
                return redirect(route('oir'));
                break;    
            case '拒绝':
                $order = $this->orderRepository->update(array_merge($allfields,['process_status'=>'6','fund_status'=>'9']), $id);
                Flash::warning('订单：'.$order->order_number.' 已拒绝放款。');
                return redirect(route('oia'));
                break; 
            case '保存':
                $order = $this->orderRepository->update($allfields, $id);
                Flash::success('订单：'.$order->order_number.' 保存成功。');
                return redirect(route('orders.index'));
                break;
                   
        }
        
    }

   

    /**
     * Remove the specified order from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $order = $this->orderRepository->findWithoutFail($id);

        if (empty($order)) {
            Flash::error('order not found');

            return redirect(route('orders.index'));
        }

        $this->orderRepository->delete($id);

        Flash::success('order deleted successfully.');

        return redirect(route('orders.index'));
    }

    /**
     * create Payable records according to the specified order. 
     *
     * @param tinyint $type, model $order,int $sn
     * @return boolean 
     *
     * 
    */
    private function createPayables($type, $order,$sn=1)
    {
        $repay_period_setting = $order->goods->fundproduct->repay_period;
        if($type==1){ //对商户付款
            $arr_inputs=array('order_id'=>$order->id,
            'type'=>$type,
            'shop_id'=>$order->shop->id,
            'goods_id'=>$order->goods_id,
            'fund_product_id'=>$order->goods->fund_product_id,
            'amount_scheduled'=>$order->platform_payout,
            'amount_actual'=>0,
            'adjustment_amount'=>0,
            'serial_no'=>$sn,
            'pd_scheduled'=>Carbon::now()->addDays(3),
            'pd_actual'=>'',
            'handled_by'=>Auth::user()->email,
            'ip_address'=>'',
            'memo'=>'',
            'status'=>0
            );
            $o = $this->payableRepo->create($arr_inputs);
            if($o){
                return true;
            }
            return false;
        }
        
        if($type==2){ //对资金方付款（还款）

            $times = $order->goods->fundproduct->repay_times; //还款次数
            $return_pct = $order->goods->fundproduct->return_pct; //
            $return_ttl = round($order->credit_given*$return_pct/100,2);//应还本息总额
            $repay_amount_ttl = 0;
            for ($i=1; $i<=$times ; $i++) { 
                if($i==$times){
                    $repay_amount = $repay_ttl-$repay_amount_ttl; //to avoid rounding difference
                }else{
                    $repay_amount = round($repay_ttl/$times,2);
                }
                $repay_amount_ttl += $repay_amount;
                $arr_inputs=array('order_id'=>$order->id,
                    'type'=>$type,
                    'shop_id'=>$order->shop->id,
                    'goods_id'=>$order->goods_id,
                    'fund_product_id'=>$order->goods->fund_product_id,
                    'amount_scheduled'=>$repay_amount,
                    'amount_actual'=>0,
                    'adjustment_amount'=>0,
                    'serial_no'=>$i,
                    'pd_actual'=>'',
                    'handled_by'=>Auth::user()->email,
                    'ip_address'=>$this->req->ip(),
                    'memo'=>'',
                    'status'=>0
                );
                switch ($repay_period_setting) {
                    case 0:
                        $pd_scheduled = ['pd_scheduled'=>Carbon::createFromFormat('Y-m-d',$order->effective_date)->addMonths($i)];
                        break;
                    case 1:
                        $pd_scheduled = ['pd_scheduled'=>Carbon::createFromFormat('Y-m-d',$order->effective_date)->addDays($i*30)];
                        break;
                    case 2:
                        $pd_scheduled = ['pd_scheduled'=>Carbon::createFromFormat('Y-m-d',$order->effective_date)->addMonths($i*3)];
                        break;
                    case 3:
                        $pd_scheduled = ['pd_scheduled'=>Carbon::createFromFormat('Y-m-d',$order->effective_date)->addMonths($i*6)];
                        break;        
                    default:
                        $pd_scheduled = ['pd_scheduled'=>Carbon::createFromFormat('Y-m-d',$order->effective_date)->addMonths($i)];
                        break;
                }
                $arr_inputs = array_merge($arr_inputs,$pd_scheduled);
                $o = $this->payableRepo->create($arr_inputs);
            }
            return true;
        }
        
        return false;
        
    }

    private function createReceivables($type,$order,$sn=1)
    {
        $repay_period_setting = $order->goods->fundproduct->repay_period;
        
        if($type==1){ //应收资金方（资金方付款）
            $arr_inputs=array('order_id'=>$order->id,
            'type'=>$type,
            'shop_id'=>$order->shop->id,
            'goods_id'=>$order->goods_id,
            'fund_product_id'=>$order->goods->fund_product_id,
            'amount_scheduled'=>$order->apply_amount,
            'amount_actual'=>0,
            'adjustment_amount'=>0,
            'serial_no'=>$sn,
            'pd_scheduled'=>Carbon::now()->addDays(3),
            'pd_actual'=>'',
            'handled_by'=>Auth::user()->email,
            'ip_address'=>$this->req->ip(),
            'memo'=>'',
            'status'=>0
            );

            $o = $this->receivableRepo->create($arr_inputs);

            if($o){
                return true;
            }

            return false;
        }

        

        if($type==2){ //应收借款人（借款人还款）
            $times = $order->goods->repay_times; //还款次数
            $downpayment = $order->downpayment_amount;
            $adjustment = $order->adjustment_amount;
            $repay_target =$order->repay_target;
            $repay_amount_ttl = 0;

            for ($i=1; $i<=$times ; $i++) {   
                
                if($i==$times){
                    $repay_amount = $repay_target-$downpayment-$repay_amount_ttl;
                }else{
                    //$repay_amount = ($order->apply_amount)*($order->goods->repay_pct/100.00);
                    $repay_amount = round(($repay_target-$downpayment+$adjustment)/$times,2);

                }
                $repay_amount_ttl += $repay_amount;
                $arr_inputs=array('order_id'=>$order->id,
                    'type'=>$type,
                    'shop_id'=>$order->shop->id,
                    'goods_id'=>$order->goods_id,
                    'fund_product_id'=>$order->goods->fund_product_id,
                    'amount_scheduled'=>$repay_amount,
                    'amount_actual'=>0,
                    'adjustment_amount'=>0,
                    'serial_no'=>$i,
                    'pd_actual'=>'',
                    'handled_by'=>Auth::user()->email,
                    'ip_address'=>$this->req->ip(),
                    'memo'=>'',
                    'status'=>0
                );
                switch ($repay_period_setting) {
                    case 0:
                        $pd_scheduled = ['pd_scheduled'=>Carbon::createFromFormat('Y-m-d',$order->effective_date)->addMonths($i)];
                        break;
                    case 1:
                        $pd_scheduled = ['pd_scheduled'=>Carbon::createFromFormat('Y-m-d',$order->effective_date)->addDays($i*30)];
                        break;
                    case 2:
                        $pd_scheduled = ['pd_scheduled'=>Carbon::createFromFormat('Y-m-d',$order->effective_date)->addMonths($i*3)];
                        break;
                    case 3:
                        $pd_scheduled = ['pd_scheduled'=>Carbon::createFromFormat('Y-m-d',$order->effective_date)->addMonths($i*6)];
                        break;        
                    default:
                        $pd_scheduled = ['pd_scheduled'=>Carbon::createFromFormat('Y-m-d',$order->effective_date)->addMonths($i)];
                        break;
                }
                $arr_inputs = array_merge($arr_inputs,$pd_scheduled);
                $o = $this->receivableRepo->create($arr_inputs);
            }
            
                return true;
        }

        return false;
    }

    private function getOrderNumber($order_type=1)
    {
        switch ($order_type) {
            case 1: //car insurance
                $prefix = 'CI';
                break;
            
            default:
                $prefix = 'YFQ';
                break;
        }

        $code = str_replace("-","",Carbon::now()->toDateString());

        if(version_compare(PHP_VERSION,'7.0.0', '<') ){
            return $prefix.$code.mt_rand(10000,99999);

        }else{

           return $prefix.$code.random_int(10000,99999);
        }
        return "";

    }

    
}
