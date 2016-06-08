<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatepayableRequest;
use App\Http\Requests\UpdatepayableRequest;
use App\Repositories\payableRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class payableController extends AppBaseController
{
    /** @var  payableRepository */
    private $payableRepository;

    public function __construct(payableRepository $payableRepo)
    {
        $this->payableRepository = $payableRepo;
    }

    /**
     * Display a listing of the payable.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
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
        $payable = $this->payableRepository->findWithoutFail($id);

        if (empty($payable)) {
            Flash::error('payable not found');

            return redirect(route('payables.index'));
        }

        $this->payableRepository->delete($id);

        Flash::success('payable deleted successfully.');

        return redirect(route('payables.index'));
    }
}
