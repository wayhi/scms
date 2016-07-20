<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatereceivableRequest;
use App\Http\Requests\UpdatereceivableRequest;
use App\Repositories\ReceivableRepository;
use App\Repositories\MerchantsRepository;
use App\Criteria\SummaryCriteria;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Carbon\Carbon;
use Auth;
use Entrust;

class receivableController extends AppBaseController
{
    /** @var  receivableRepository */
    private $receivableRepository;
    private $merchantsRepository;

    public function __construct(receivableRepository $receivableRepo, MerchantsRepository $merchantsRepo)
    {
        $this->receivableRepository = $receivableRepo;
        $this->merchantsRepository = $merchantsRepo;
    }

    /**
     * Display a listing of the receivable.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if(!Entrust::can(['receivable_viewer','admin','owner'])){
            return response()->view('errors.403');
        }
        $this->receivableRepository->pushCriteria(new RequestCriteria($request));
        $receivables = $this->receivableRepository->with(['order','shop','goods','fundproduct'])->paginate(10);
        $links = $receivables->links();
        return view('receivables.index')
            ->with(['receivables'=>$receivables,'links'=>$links]);
    }

    /*
     * Show the form for creating a new receivable.
     *
     * @return Response
     */
    public function create()
    {
        return view('receivables.create');
    }

    /**
     * Store a newly created receivable in storage.
     *
     * @param CreatereceivableRequest $request
     *
     * @return Response
     */
    public function store(CreatereceivableRequest $request)
    {
        $input = $request->all();

        $receivable = $this->receivableRepository->create($input);

        Flash::success('receivable saved successfully.');

        return redirect(route('receivables.index'));
    }

    /**
     * Display the specified receivable.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if(!Entrust::can(['receivable_viewer','admin','owner'])){
            return response()->view('errors.403');
        }
        $receivable = $this->receivableRepository->with(['order.goods','shop','goods'])->findWithoutFail($id);

        if (empty($receivable)) {
            Flash::error('receivable not found');

            return redirect(route('receivables.index'));
        }

        return view('receivables.show')->with('receivable', $receivable);
    }

    /**
     * Show the form for editing the specified receivable.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if(!Entrust::can(['receivable_viewer','admin','owner'])){
            return response()->view('errors.403');
        }
        $receivable = $this->receivableRepository->findWithoutFail($id);

        if (empty($receivable)) {
            Flash::error('receivable not found');

            return redirect(route('receivables.index'));
        }

        return view('receivables.edit')->with('receivable', $receivable);
    }

    /**
     * Update the specified receivable in storage.
     *
     * @param  int              $id
     * @param UpdatereceivableRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatereceivableRequest $request)
    {
        $receivable = $this->receivableRepository->findWithoutFail($id);

        if (empty($receivable)) {
            Flash::error('receivable not found');

            return redirect(route('receivables.index'));
        }

        $receivable = $this->receivableRepository->update($request->all(), $id);

        Flash::success('receivable updated successfully.');

        return redirect(route('receivables.index'));
    }

    /**
     * Remove the specified receivable from storage.
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
        $receivable = $this->receivableRepository->findWithoutFail($id);

        if (empty($receivable)) {
            Flash::error('receivable not found');

            return redirect(route('receivables.index'));
        }

        $this->receivableRepository->delete($id);

        Flash::success('receivable deleted successfully.');

        return redirect(route('receivables.index'));
    }

    /**
     * Show the form for summary of service fee and downpayment.
     *
     * @return Response
     */
    public function summary()
    {
        if(!Entrust::can(['receivable_viewer','admin','owner'])){
            return response()->view('errors.403');
        }
        $merchants_list = $this->merchantsRepository->lists('merchant_name','id')->toArray();
        
        return view('receivables.summary')->with(['merchants_list'=>$merchants_list,'merchant_id'=>'','results'=>null,'active_pane'=>1]);
    }
    /**
     * Show the search_results of summary.
     *
     * @return Response
     */
    public function summary_results(Request $searchRequest)
    {
        
        if(!Entrust::can(['receivable_viewer','admin','owner'])){
            return response()->view('errors.403');
        }
        $merchants_list = $this->merchantsRepository->lists('merchant_name','id')->toArray();
        $action = $searchRequest->action;
        $criteria = new SummaryCriteria();
        $active_pane = 1;
        $merchant_id="";
        if($action=='贷前应收汇总')
        {
            $criteria->setStartDate($searchRequest->start_date);
            $criteria->setEndDate($searchRequest->end_date);
            $merchant_id = $searchRequest->merchant_id_1;
            $criteria->setMerchantID($merchant_id);
            $criteria->setType([3,4]);
            $active_pane = 1;
        }
        if($action=='用户应还汇总')
        {
            
            $criteria->setStartDate($searchRequest->start_date_2);
            $criteria->setEndDate($searchRequest->end_date_2);
            $merchant_id = $searchRequest->merchant_id_2;
            $criteria->setMerchantID($merchant_id);
            $criteria->setType([2]);
            $active_pane = 2;
        }

        if($action == '收讫')
        {
            if(!Entrust::can(['receivable_editor','admin','owner'])){
                return response()->view('errors.403');
            }
            if(!empty($searchRequest->ar_chk)){

                $n = count($searchRequest->ar_chk);
                for($i=0;$i<$n;$i++){
                    $uid = $searchRequest->ar_chk[$i];
                    $receivable = $this->receivableRepository->findWithoutFail($uid);
                    if (empty($receivable)) {
                        Flash::error('receivable(id:'.$uid.') not found');
                        //return redirect(route('receivables.index'));
                    }else{
                        if($receivable->type==4||$receivable->type==2){//如果是预缴款（抵扣借款）或还款则更新订单中“实际还款”字段
                            $receivable->order->repay_actual += $receivable->amount_scheduled;
                            $receivable->order->save();
                        }
                        
                        $receivable = $this->receivableRepository
                        ->update(['status'=>2,'amount_actual'=>$receivable->amount_scheduled,'pd_actual'=>Carbon::now()], $uid);
                    }
                    
                } 
              Flash::success($n.'条记录状态更新成功！');
              return view('receivables.summary')->with([
                'merchants_list'=>$merchants_list,
                'merchant_id'=>$searchRequest->merchant_id_1,
                'results'=>null, 
                'amount_sum'=>0,
                'active_pane'=>1
               ]);     
            }

        }   
        
        $this->receivableRepository->pushCriteria($criteria);
        $results = $this->receivableRepository->with(['order','shop.merchant','goods'])->all();
        $amount_sum = $results->sum('amount_scheduled');
        return view('receivables.summary')->with([
            'merchants_list'=>$merchants_list,
            'merchant_id'=>$merchant_id,
            'results'=>$results, 
            'amount_sum'=>$amount_sum,
            'active_pane'=>$active_pane
            ]);

    }

    

}
