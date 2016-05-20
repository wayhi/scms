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
        $merchants = $this->merchantsRepository->findWithoutFail($id);

        if (empty($merchants)) {
            Flash::error('merchants not found');

            return redirect(route('merchants.index'));
        }

        return view('merchants.show')->with('merchants', $merchants);
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

        Flash::success('merchants updated successfully.');

        return redirect(route('merchants.index'));
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