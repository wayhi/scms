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
        $this->fundProductRepository->pushCriteria(new RequestCriteria($request));
        $fundProducts = $this->fundProductRepository->all();

        return view('fundproducts.index')
            ->with('fundproducts', $fundProducts);
    }

    /**
     * Show the form for creating a new FundProduct.
     *
     * @return Response
     */
    public function create()
    {
        return view('fundproducts.create');
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
        //return "ok";
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
        $fundProduct = $this->fundProductRepository->findWithoutFail($id);

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
        $fundProduct = $this->fundProductRepository->findWithoutFail($id);

        if (empty($fundProduct)) {
            Flash::error('FundProduct not found');

            return redirect(route('fundproducts.index'));
        }

        return view('fundproducts.edit')->with('fundproduct', $fundProduct);
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
