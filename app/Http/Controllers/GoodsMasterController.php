<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\Creategoods_masterRequest;
use App\Http\Requests\Updategoods_masterRequest;
use App\Repositories\goods_masterRepository;
use App\Repositories\FundProductRepository;
use App\Repositories\MerchantsRepository;
use App\Repositories\SupportingRepository;
use App\Facades\RoleRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response,DB;
use App\Models\Merchants;

class GoodsMasterController extends AppBaseController
{
    /** @var  goods_masterRepository */
    private $goodsMasterRepository;
    private $FundProductRepository;
    private $MerchantsRepository;
    private $SupportingRepository;

    public function __construct(goods_masterRepository $goodsMasterRepo,FundProductRepository $fundprodrepo,MerchantsRepository $merchantsRepo, SupportingRepository $supportingRepo)
    {
        $this->goodsMasterRepository = $goodsMasterRepo;
        $this->FundProductRepository = $fundprodrepo;
        $this->MerchantsRepository = $merchantsRepo;
        $this->SupportingRepository = $supportingRepo;
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
        $supportings = $this->SupportingRepository->lists('title','id');
        $roles = RoleRepository::lists('display_name','id');
        return view('goodsMasters.create')->with(['merchants'=>$merchants,'fundproducts'=>$fundproducts,'supportings'=>$supportings,'roles'=>$roles]);
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
        $input = $request->except(['supporting_ids']);
        if($request->has('supporting_ids')){ //审核所需文件，多选项
            $tmp_supportings = $request->get('supporting_ids');
            $input = array_add($input,'supporting_ids',implode(',',$tmp_supportings));
        }

        $goodsMaster = $this->goodsMasterRepository->create($input);

        
        if($request->has('supporting_ids')) {
            $supporting_ids = $request->input('supporting_ids');
            
            foreach ($supporting_ids as $supporting_id) {
                DB::table('goods_supporting')->insert(['goods_id'=>$goodsMaster->id,'supporting_id'=>$supporting_id]);
            }
        }

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
        $goodsMaster = $this->goodsMasterRepository->with(['supportings','role'])->findWithoutFail($id);

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
        $supportings = $this->SupportingRepository->lists('title','id');
        $supportings_selected = $goodsMaster->supportings()->select('id')->get()->toArray();
        $supportings_selected_ids = array_column($supportings_selected,'id');
        $roles = RoleRepository::lists('display_name','id');
        return view('goodsMasters.edit')->with(['goodsMaster'=>$goodsMaster,'merchants'=>$merchants,'fundproducts'=>$fundproducts,'supportings'=>$supportings,'supportings_selected_ids'=>$supportings_selected_ids,'action'=>'edit','roles'=>$roles]);
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

        if($request->has('supporting_ids')){
            $goodsMaster = $this->goodsMasterRepository->update($request->except(['supporting_ids']), $id);
            $goodsMaster = $this->goodsMasterRepository->update(['supporting_ids'=>implode(',',$request->supporting_ids)], $id);
            DB::table('goods_supporting')->where('goods_id',$id)->delete();
            foreach($request->supporting_ids as $supporting_id){
                DB::table('goods_supporting')->insert(['goods_id'=>$id,'supporting_id'=>$supporting_id]);
            }

        }else{
            $goodsMaster = $this->goodsMasterRepository->update($request->except(['supporting_ids']), $id);
            $goodsMaster = $this->goodsMasterRepository->update(['supporting_ids'=>''], $id);
            DB::table('goods_supporting')->where('goods_id',$id)->delete();

        }

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
