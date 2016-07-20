<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatepayableRequest;
use App\Http\Requests\UpdatepayableRequest;
use App\Repositories\PayableRepository;
use App\Repositories\MerchantsRepository;
use App\Criteria\SummaryCriteria;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Carbon\Carbon;
use Auth;
use Entrust;

class payableController extends AppBaseController
{
    /** @var  payableRepository */
    private $payableRepository;
    private $merchantsRepository;

    public function __construct(payableRepository $payableRepo,MerchantsRepository $merchantsRepo)
    {
        $this->payableRepository = $payableRepo;
        $this->merchantsRepository = $merchantsRepo;
    }

    /**
     * Display a listing of the payable.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if(!Entrust::can(['payable_viewer','admin','owner'])){
            return response()->view('errors.403');
        }
        $this->payableRepository->pushCriteria(new RequestCriteria($request));
        $payables = $this->payableRepository->with(['order','shop','fundproduct'])->paginate(10);
        $links = $payables->links();
        return view('payables.index')
            ->with(['payables'=>$payables,'links'=>$links]);
    }

    /**
     * Show the form for creating a new payable.
     *
     * @return Response
     */
    public function create()
    {
        return view('payables.create');
    }

    /**
     * Store a newly created payable in storage.
     *
     * @param CreatepayableRequest $request
     *
     * @return Response
     */
    public function store(CreatepayableRequest $request)
    {
        $input = $request->all();

        $payable = $this->payableRepository->create($input);

        Flash::success('payable saved successfully.');

        return redirect(route('payables.index'));
    }

    /**
     * Display the specified payable.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if(!Entrust::can(['payable_viewer','admin','owner'])){
            return response()->view('errors.403');
        }   
        $payable = $this->payableRepository->findWithoutFail($id);

        if (empty($payable)) {
            Flash::error('payable not found');
            return redirect(route('payables.index'));
        }

        return view('payables.show')->with('payable', $payable);
    }

    /**
     * Show the form for editing the specified payable.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if(!Entrust::can(['payable_viewer','admin','owner'])){
            return response()->view('errors.403');
        }
        $payable = $this->payableRepository->findWithoutFail($id);

        if (empty($payable)) {
            Flash::error('payable not found');

            return redirect(route('payables.index'));
        }

        return view('payables.edit')->with('payable', $payable);
    }

    /**
     * Update the specified payable in storage.
     *
     * @param  int              $id
     * @param UpdatepayableRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepayableRequest $request)
    {
        $payable = $this->payableRepository->findWithoutFail($id);

        if (empty($payable)) {
            Flash::error('payable not found');

            return redirect(route('payables.index'));
        }

        $payable = $this->payableRepository->update($request->all(), $id);

        Flash::success('payable updated successfully.');

        return redirect(route('payables.index'));
    }

    /**
     * Remove the specified payable from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(!Entrust::can(['owner'])){
            return response()->view('errors.403');
        }

        $payable = $this->payableRepository->findWithoutFail($id);

        if (empty($payable)) {
            Flash::error('payable not found');

            return redirect(route('payables.index'));
        }

        $this->payableRepository->delete($id);

        Flash::success('payable deleted successfully.');

        return redirect(route('payables.index'));
    }

    /**
     * Show the form for summary of payables.
     *
     * @return Response
     */
    public function summary()
    {
        if(!Entrust::can(['payable_viewer','admin','owner'])){
            return response()->view('errors.403');
        }
        $merchants_list = $this->merchantsRepository->lists('merchant_name','id')->toArray();
        
        return view('payables.summary')->with(['merchants_list'=>$merchants_list,'merchant_id'=>'','results'=>null,'active_pane'=>1]);
    }

    /**
     * Show the search_results of summary.
     *
     * @return Response
     */
    public function summary_results(Request $searchRequest)
    {
        
        if(!Entrust::can(['payable_viewer','admin','owner'])){
            return response()->view('errors.403');
        }
        $merchants_list = $this->merchantsRepository->lists('merchant_name','id')->toArray();
        $action = $searchRequest->action;
        $criteria = new SummaryCriteria();
        $active_pane = 1;
        $merchant_id="";
        if($action=='应付商家汇总')
        {
            $criteria->setStartDate($searchRequest->start_date);
            $criteria->setEndDate($searchRequest->end_date);
            $merchant_id = $searchRequest->merchant_id_1;
            $criteria->setMerchantID($merchant_id);
            $criteria->setType([1]);
            $active_pane = 1;
        }
        if($action=='应付资金方汇总')
        {
            
            $criteria->setStartDate($searchRequest->start_date_2);
            $criteria->setEndDate($searchRequest->end_date_2);
            $merchant_id = $searchRequest->merchant_id_2;
            $criteria->setMerchantID($merchant_id);
            $criteria->setType([2]);
            $active_pane = 2;
        }

        if($action == '已支付')
        {
            if(!Entrust::can(['payable_editor','admin','owner'])){
                return response()->view('errors.403');
            }
            if(!empty($searchRequest->ar_chk)){

                $n = count($searchRequest->ar_chk);
                for($i=0;$i<$n;$i++){
                    $uid = $searchRequest->ar_chk[$i];
                    $payable = $this->payableRepository->findWithoutFail($uid);
                    if (empty($payable)) {
                        Flash::error('payables(id:'.$uid.') not found');
                        //return redirect(route('receivables.index'));
                    }else{
                        
                        $payable = $this->payableRepository
                        ->update(['status'=>2,'amount_actual'=>$payable->amount_scheduled,'pd_actual'=>Carbon::now()], $uid);
                        
                    }  
                } 
              Flash::success($n.'条应付记录状态更新成功！');
              return view('payables.summary')->with([
                'merchants_list'=>$merchants_list,
                'merchant_id'=>$searchRequest->merchant_id_1,
                'results'=>null, 
                'amount_sum'=>0,
                'active_pane'=>1
               ]);     
            }

        }   
        
        $this->payableRepository->pushCriteria($criteria);
        $results = $this->payableRepository->with(['order','shop','goods'])->all();
        $amount_sum = $results->sum('amount_scheduled');
        return view('payables.summary')->with([
            'merchants_list'=>$merchants_list,
            'merchant_id'=>$merchant_id,
            'results'=>$results, 
            'amount_sum'=>$amount_sum,
            'active_pane'=>$active_pane
            ]);

    }
}
