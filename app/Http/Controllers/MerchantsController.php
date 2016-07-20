<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatemerchantsRequest;
use App\Http\Requests\UpdatemerchantsRequest;
use App\Repositories\MerchantsRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Entrust;

class MerchantsController extends AppBaseController
{
    /** @var  merchantsRepository */
    private $merchantsRepository;

    public function __construct(MerchantsRepository $merchantsRepo)
    {
        $this->merchantsRepository = $merchantsRepo;
    }

    /**
     * Display a listing of the merchants.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if(!Entrust::can(['merchant_viewer','admin','owner'])){
            return response()->view('errors.403');
        }
        $this->merchantsRepository->pushCriteria(new RequestCriteria($request));
        $merchants = $this->merchantsRepository->paginate(10);

        return view('merchants.index')
            ->with(['merchants'=>$merchants,'links'=>$merchants->links()]);
    }

    /**
     * Show the form for creating a new merchants.
     *
     * @return Response
     */
    public function create()
    {
        return view('merchants.create');
    }

    /**
     * Store a newly created merchants in storage.
     *
     * @param CreatemerchantsRequest $request
     *
     * @return Response
     */
    public function store(CreatemerchantsRequest $request)
    {
        $input = $request->all();
        if(empty($input['merchant_cert'])){
            $input=array_merge($input,["merchant_cert"=>"{\"certfiles\":[]}"]);
        }
        $merchants = $this->merchantsRepository->create($input);

        Flash::success('merchants saved successfully.');
        return redirect(route('merchants.index'));
    }

    /**
     * Display the specified merchants.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if(!Entrust::can(['merchant_viewer','admin','owner'])){
            return response()->view('errors.403');
        }
        $merchants = $this->merchantsRepository->findWithoutFail($id);

        if (empty($merchants)) {
            Flash::error('merchants not found');
            return redirect(route('merchants.index'));
        }
        $expires=time() + 3600;
        $signature="";
        return view('merchants.show')->with(['merchants'=>$merchants,'expires'=>$expires,'signature'=>$signature]);
    }

    /**
     * Show the form for editing the specified merchants.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if(!Entrust::can(['merchant_viewer','admin','owner'])){
            return response()->view('errors.403');
        }
        $merchants = $this->merchantsRepository->findWithoutFail($id);

        if (empty($merchants)) {
            Flash::error('merchants not found');
            return redirect(route('merchants.index'));
        }

        return view('merchants.edit')->with('merchants', $merchants);
    }

    /**
     * Update the specified merchants in storage.
     *
     * @param  int              $id
     * @param UpdatemerchantsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemerchantsRequest $request)
    {
        $merchants = $this->merchantsRepository->findWithoutFail($id);

        if (empty($merchants)) {
            Flash::error('merchants not found');

            return redirect(route('merchants.index'));
        }

        $merchants = $this->merchantsRepository->update($request->all(), $id);

        if($request->get('save')==''){
            return view('merchants.edit')->with(['merchants'=>$merchants]);
        }else{
            Flash::success('merchants updated successfully.');

            return redirect(route('merchants.index'));
        }

        
    }

    /**
     * Remove the specified merchants from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $merchants = $this->merchantsRepository->findWithoutFail($id);

        if (empty($merchants)) {
            Flash::error('merchants not found');

            return redirect(route('merchants.index'));
        }

        $this->merchantsRepository->delete($id);

        Flash::success('merchants deleted successfully.');

        return redirect(route('merchants.index'));
    }
}
