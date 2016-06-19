<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatereceivableRequest;
use App\Http\Requests\UpdatereceivableRequest;
use App\Repositories\receivableRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class receivableController extends AppBaseController
{
    /** @var  receivableRepository */
    private $receivableRepository;

    public function __construct(receivableRepository $receivableRepo)
    {
        $this->receivableRepository = $receivableRepo;
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
        $receivables = $this->receivableRepository->with(['order','shop','fundproduct'])->paginate(10);
        $links = $receivables->links();
        return view('receivables.index')
            ->with(['receivables'=>$receivables,'links'=>$links]);
    }

    /**
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
        $receivable = $this->receivableRepository->with(['order.goods','shop','fundproduct'])->findWithoutFail($id);

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
}
