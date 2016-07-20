<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateFundProductRequest;
use App\Http\Requests\UpdateFundProductRequest;
use App\Repositories\FundProductRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Funds;
use Entrust;

class FundProductController extends AppBaseController
{
    /** @var  FundProductRepository */
    private $fundProductRepository;

    public function __construct(FundProductRepository $fundProductRepo)
    {
        $this->fundProductRepository = $fundProductRepo;
    }

    /**
     * Display a listing of the FundProduct.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if(!Entrust::can(['fund_viewer','admin','owner'])){
            return response()->view('errors.403');
        }
        $this->fundProductRepository->pushCriteria(new RequestCriteria($request));
        $fundProducts = $this->fundProductRepository->with(['fund'])->paginate(10);
        $links = $fundProducts->links();
        return view('fundproducts.index')
            ->with(['fundproducts'=>$fundProducts,'links'=>$links]);
    }

    /**
     * Show the form for creating a new FundProduct.
     *
     * @return Response
     */
    public function create()
    {
        $fundlist = Funds::all()->lists('fund_name','id');
        return view('fundproducts.create')->with('fundlist',$fundlist);
    }

    /**
     * Store a newly created FundProduct in storage.
     *
     * @param CreateFundProductRequest $request
     *
     * @return Response
     */
    public function store(CreateFundProductRequest $request)
    {
       
        $input = $request->all();

        $fundProduct = $this->fundProductRepository->create($input);

        Flash::success('FundProduct saved successfully.');

        return redirect(route('fundproducts.index'));
    }

    /**
     * Display the specified FundProduct.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fundProduct = $this->fundProductRepository->with(['fund'])->findWithoutFail($id);

        if (empty($fundProduct)) {
            Flash::error('FundProduct not found');

            return redirect(route('fundproducts.index'));
        }

        return view('fundproducts.show')->with('fundproduct', $fundProduct);
    }

    /**
     * Show the form for editing the specified FundProduct.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if(!Entrust::can(['fund_viewer','admin','owner'])){
            return response()->view('errors.403');
        }
        $fundProduct = $this->fundProductRepository->findWithoutFail($id);

        if (empty($fundProduct)) {
            Flash::error('FundProduct not found');

            return redirect(route('fundproducts.index'));
        }
        $fundlist = Funds::all()->lists('fund_name','id');
        return view('fundproducts.edit')->with(['fundproduct'=>$fundProduct,'fundlist'=>$fundlist]);
    }

    /**
     * Update the specified FundProduct in storage.
     *
     * @param  int              $id
     * @param UpdateFundProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFundProductRequest $request)
    {
        $fundProduct = $this->fundProductRepository->findWithoutFail($id);

        if (empty($fundProduct)) {
            Flash::error('FundProduct not found');

            return redirect(route('fundproducts.index'));
        }

        $fundProduct = $this->fundProductRepository->update($request->all(), $id);

        Flash::success('FundProduct updated successfully.');

        return redirect(route('fundproducts.index'));
    }

    /**
     * Remove the specified FundProduct from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(!Entrust::can(['fund_editor','admin','owner'])){
            return response()->view('errors.403');
        }
        $fundProduct = $this->fundProductRepository->findWithoutFail($id);

        if (empty($fundProduct)) {
            Flash::error('FundProduct not found');

            return redirect(route('fundproducts.index'));
        }

        $this->fundProductRepository->delete($id);

        Flash::success('FundProduct deleted successfully.');

        return redirect(route('fundproducts.index'));
    }
}
