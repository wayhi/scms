<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\OrderRepository;
use App\Repositories\goods_masterRepository;
use App\Repositories\CustomerRepo;
use App\Repositories\PayableRepository;
use App\Repositories\ReceivableRepository;
use Flash;
use Response;
use Carbon\Carbon;
use Auth,DB;
use Entrust;

class dashboardController extends AppBaseController
{
    private $orderRepository;
    private $goods_masterRepo;
    private $payableRepo;
    private $receivableRepo;
    private $customerRepo;

    public function __construct(OrderRepository $orderRepo, goods_masterRepository $goods_masterRepo,PayableRepository $payableRepo, ReceivableRepository $receivableRepo,CustomerRepo $customerRepo)
    {
        $this->orderRepository = $orderRepo;
        $this->goods_masterRepo = $goods_masterRepo;
        $this->payableRepo = $payableRepo;
        $this->receivableRepo = $receivableRepo;
        $this->customerRepo = $customerRepo;
    }

     public function index(Request $request)
    {
    	if(!Entrust::can(['dashboard_viewer','admin','owner'])){
            return response()->view('errors.403');
        }

        $txs_value_ytd = self::getTXS_Value_YTD();
        return view('dashboard')->with(['txs_value_ytd'=>$txs_value_ytd]);

    }

    private function getTXS_Value_YTD()
    {

    	return $this->orderRepository->findWhere([
    		['process_status','>',1],
    		[DB::raw('year(effective_date)'),'=',2016]
    		])->sum('apply_amount');


    }	

    private function getTXS_Value_MTD()
    {



    }

    private function getTXS_Volume_MTD()

    {

    }

    private function getLoans_Balance()
    {
    	//
    }

    
}
