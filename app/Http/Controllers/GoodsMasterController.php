<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\Creategoods_masterRequest;
use App\Http\Requests\Updategoods_masterRequest;
use App\Repositories\goods_masterRepository;
use App\Repositories\FundProductRepository;
use App\Repositories\MerchantsRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Merchants;

class GoodsMasterController extends AppBaseController
{
    /** @var  goods_masterRepository */
    private $goodsMasterRepository;
    private $FundProductRepository;
    private $MerchantsRepository;

    public function __construct(goods_masterRepository $goodsMasterRepo,FundProductRepository $fundprodrepo,MerchantsRepository $merchantsRepo)
    {
        $this->goodsMasterRepository = $goodsMasterRepo;
        $this->FundProductRepository = $fundprodrepo;
        $this->MerchantsRepository = $merchantsRepo;
    }

    /**
     * Display a listing of the goods_master.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->goodsMasterRepository->pushCriteria(new RequestCriteria($request));
        $goodsMasters = $this->goodsMasterRepository->with(['fundproduct','merchant'])->paginate(10);
        $links = $goodsMasters->links();
        return view('goodsMasters.index')
            ->with(['goodsMasters'=>$goodsMasters,'links'=>$links]);
    }

    /**
     * Show the form for creating a new goods_master.
     *
     * @return Response
     */
    public function create()
    {
        $merchants = $this->MerchantsRepository->lists('merchant_name','id');
        $fundproducts = $this->FundProductRepository->lists('product_name','id');
        return view('goodsMasters.create')->with(['merchants'=>$merchants,'fundproducts'=>$fundproducts]);
    }

    /**
     * Store a newly created goods_master in storage.
     *
     * @param Creategoods_masterRequest $request
     *
     * @return Response
     */
    public function store(Creategoods_masterRequest $request)
    {
        $input = $request->all();

        $goodsMaster = $this->goodsMasterRepository->create($input);

        Flash::success('goods_master saved successfully.');

        return redirect(route('goodsMasters.index'));
    }

    /**
     * Display the specified goods_master.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $goodsMaster = $this->goodsMasterRepository->findWithoutFail($id);

        if (empty($goodsMaster)) {
            Flash::error('goods_master not found');

            return redirect(route('goodsMasters.index'));
        }

        return view('goodsMasters.show')->with('goodsMaster', $goodsMaster);
    }

    /**
     * Show the form for editing the specified goods_master.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $goodsMaster = $this->goodsMasterRepository->findWithoutFail($id);

        if (empty($goodsMaster)) {
            Flash::error('goods_master not found');

            return redirect(route('goodsMasters.index'));
        }
        $merchants = $this->MerchantsRepository->lists('merchant_name','id');
        $fundproducts = $this->FundProductRepository->lists('product_name','id');
        return view('goodsMasters.edit')->with(['goodsMaster'=>$goodsMaster,'merchants'=>$merchants,'fundproducts'=>$fundproducts]);
    }

    /**
     * Update the specified goods_master in storage.
     *
     * @param  int              $id
     * @param Updategoods_masterRequest $request
     *
     * @return Response
     */
    public function update($id, Updategoods_masterRequest $request)
    {
        $goodsMaster = $this->goodsMasterRepository->findWithoutFail($id);

        if (empty($goodsMaster)) {
            Flash::error('goods_master not found');

            return redirect(route('goodsMasters.index'));
        }

        $goodsMaster = $this->goodsMasterRepository->update($request->all(), $id);

        Flash::success('goods_master updated successfully.');

        return redirect(route('goodsMasters.index'));
    }

    /**
     * Remove the specified goods_master from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $goodsMaster = $this->goodsMasterRepository->findWithoutFail($id);

        if (empty($goodsMaster)) {
            Flash::error('goods_master not found');

            return redirect(route('goodsMasters.index'));
        }

        $this->goodsMasterRepository->delete($id);

        Flash::success('goods_master deleted successfully.');

        return redirect(route('goodsMasters.index'));
    }
}
