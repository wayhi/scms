<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatereceivableRequest;
use App\Http\Requests\UpdatereceivableRequest;
use App\Repositories\receivableRepository;
use App\Repositories\MerchantsRepository;
use App\Criteria\SummaryCriteria;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

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
        $merchants_list = $this->merchantsRepository->lists('merchant_name','id')->toArray();
        
        return view('receivables.summary')->with(['merchants_list'=>$merchants_list,'merchant_id'=>'','results'=>null]);
    }
    /**
     * Show the search_results of summary.
     *
     * @return Response
     */
    public function summary_results(Request $searchRequest)
    {
        
        $merchants_list = $this->merchantsRepository->lists('merchant_name','id')->toArray();
      
        $merchant_id = $searchRequest->merchant_id;
        $criteria = new SummaryCriteria();
        $criteria->setStartDate($searchRequest->start_date);
        $criteria->setEndDate($searchRequest->end_date);
        $criteria->setMerchantID($merchant_id);
        $criteria->setType(3);
        $this->receivableRepository->pushCriteria($criteria);
        $results = $this->receivableRepository->with(['order','shop.merchant','goods'])->all();
        $amount_sum = $results->sum('amount_scheduled');
        return view('receivables.summary')->with([
            'merchants_list'=>$merchants_list,
            'merchant_id'=>$merchant_id,
            'results'=>$results, 
            'amount_sum'=>$amount_sum
            ]);

    }

}
