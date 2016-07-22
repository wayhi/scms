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
        setlocale(LC_MONETARY, 'zh_CN');
        $txs_value_ytd = self::getTXS_Value_YTD();
        $txs_value_mtd = self::getTXS_Value_MTD();
        $txs_volume_mtd = self::getTXS_Volume_MTD();
        $txs_loans_balance = self::getLoans_Balance();

        return view('dashboard')->with([
            'txs_value_ytd'=>$txs_value_ytd,
            'txs_value_mtd'=>$txs_value_mtd, 
            'txs_volume_mtd'=>$txs_volume_mtd, 
            'txs_loans_balance'=>$txs_loans_balance
            ]);

    }

    private function getTXS_Value_YTD()
    {

    	return money_format('%i',$this->orderRepository->findWhere([
    		['process_status','in',[2,3,4,6]],

    		[DB::raw('year(effective_date)'),'=',date('Y')]
    		])->sum('apply_amount'));


    }	

    private function getTXS_Value_MTD()
    {

        return money_format('%i',$this->orderRepository->findWhere([
            ['process_status','in',[2,3,4,6]],
            [DB::raw('year(effective_date)'),'=',date('Y')],
            [DB::raw('month(effective_date)'),'=',date('m')]
            ])->sum('apply_amount'));

    }

    private function getTXS_Volume_MTD()
    {
        return $this->orderRepository->findWhere([
            ['process_status','in',[2,3,4,6]],
            [DB::raw('year(effective_date)'),'=',date('Y')],
            [DB::raw('month(effective_date)'),'=',date('m')]
            ])->count('*');
    }

    private function getLoans_Balance()
    {
    	
        return money_format('%i',$this->receivableRepo->findWhere([
        ['status','<>',2],
        ['type','=',2]
            ])->sum('amount_scheduled'));
    }

    
}
