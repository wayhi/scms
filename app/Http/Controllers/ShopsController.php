<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateshopsRequest;
use App\Http\Requests\UpdateshopsRequest;
use App\Repositories\ShopsRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Merchants;
use Entrust;

class ShopsController extends AppBaseController
{
    /** @var  shopsRepository */
    private $shopsRepository;

    public function __construct(ShopsRepository $shopsRepo)
    {
        $this->shopsRepository = $shopsRepo;
    }

    /**
     * Display a listing of the shops.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if(!Entrust::can(['merchant_viewer','admin','owner'])){
            return response()->view('errors.403');
        }
        $this->shopsRepository->pushCriteria(new RequestCriteria($request));
        $shops = $this->shopsRepository->with(['merchant'])->paginate(10);

        return view('shops.index')->with(['shops'=>$shops,'links'=>$shops->links()]);
    }

    /**
     * Show the form for creating a new shops.
     *
     * @return Response
     */
    public function create()
    {
        $merchants = Merchants::all()->lists('merchant_name','id');
        return view('shops.create')->with('merchants',$merchants);
    }

    /**
     * Store a newly created shops in storage.
     *
     * @param CreateshopsRequest $request
     *
     * @return Response
     */
    public function store(CreateshopsRequest $request)
    {
        $input = $request->all();

        $shops = $this->shopsRepository->create($input);

        Flash::success('shops saved successfully.');

        return redirect(route('shops.index'));
    }

    /**
     * Display the specified shops.
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
        $shops = $this->shopsRepository->findWithoutFail($id);

        if (empty($shops)) {
            Flash::error('shops not found');

            return redirect(route('shops.index'));
        }

        return view('shops.show')->with('shops', $shops);
    }

    /**
     * Show the form for editing the specified shops.
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
        $shops = $this->shopsRepository->findWithoutFail($id);

        if (empty($shops)) {
            Flash::error('shops not found');
            return redirect(route('shops.index'));
        }
        $merchants = Merchants::all()->lists('merchant_name','id');
        return view('shops.edit')->with(['shops'=>$shops,'merchants'=>$merchants]);
    }

    /**
     * Update the specified shops in storage.
     *
     * @param  int              $id
     * @param UpdateshopsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateshopsRequest $request)
    {
        $shops = $this->shopsRepository->findWithoutFail($id);

        if (empty($shops)) {
            Flash::error('shops not found');

            return redirect(route('shops.index'));
        }

        $shops = $this->shopsRepository->update($request->all(), $id);

        Flash::success('shops updated successfully.');

        return redirect(route('shops.index'));
    }

    /**
     * Remove the specified shops from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(!Entrust::can(['merchant_editor','admin','owner'])){
            return response()->view('errors.403');
        }
        $shops = $this->shopsRepository->findWithoutFail($id);

        if (empty($shops)) {
            Flash::error('shops not found');

            return redirect(route('shops.index'));
        }

        $this->shopsRepository->delete($id);

        Flash::success('shops deleted successfully.');

        return redirect(route('shops.index'));
    }
}
