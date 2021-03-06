<?php


namespace App\Http\Middleware;

use Closure,Menu;
use Entrust;


class MenuBar
{
	public function handle($request, Closure $next)
    {
		Menu::make('sideBar', function($menu){

  		
      $dashboard = $menu->add('Dashboard','dashboard');
      $dashboard->prepend("<i class='fa fa-dashboard'></i><span>")->append("</span>");
      /*
      $sms = $menu->add('信贷产品',['class'=>'treeview']);
      $sms->prepend("<i class='fa fa-mobile'></i><span>")->append("</span><i class='fa fa-angle-left pull-right'></i>");
      $sms->add('客户联系','sms/start')->prepend("<i class='fa fa-circle-o'></i>");
      $sms->add('联系记录','#')->prepend("<i class='fa fa-circle-o'></i>");
      */
      $orders = $menu->add('订单管理',['class'=>'treeview']);
      $orders->prepend("<i class='fa fa-list'></i><span>")->append("</span><i class='fa fa-angle-left pull-right'></i>");
      $orders->add('所有订单','orders')->prepend("<i class='fa fa-circle-o'></i>");
      $orders->add('待审核','orders?search=1&searchFields=process_status&orderBy=created_at&sortedBy=desc')->prepend("<i class='fa fa-circle-o'></i>");
      $orders->add('放款中','orders?search=2&searchFields=process_status&orderBy=created_at&sortedBy=desc')->prepend("<i class='fa fa-circle-o'></i>");
      $orders->add('还款中','orders?search=4&searchFields=process_status&orderBy=created_at&sortedBy=desc')->prepend("<i class='fa fa-circle-o'></i>");
      $orders->add('已完成','orders?search=6&searchFields=process_status&orderBy=created_at&sortedBy=desc')->prepend("<i class='fa fa-circle-o'></i>");
      $orders->add('还款逾期','orders?search=fund_status:6&orderBy=created_at&sortedBy=desc')->prepend("<i class='fa fa-circle-o'></i>");

  	$funds = $menu->add('资金管理', ['class'=>'treeview']);
      $funds->prepend("<i class='fa fa-credit-card'></i><span>")->append("</span><i class='fa fa-angle-left pull-right'></i>");
      $ar = $funds->add('应收')->prepend("<i class='fa fa-reply'></i>");
      $ar->add('应收汇总','receivables/summary')->prepend("<i class='fa fa-circle-o'></i>");
      $ar->add('分期缴款','receivables?search=2&searchFields=type&orderBy=pd_scheduled&sortedBy=asc')->prepend("<i class='fa fa-circle-o'></i>");
      $ar->add('服务费','receivables?search=3&searchFields=type&orderBy=pd_scheduled&sortedBy=asc')->prepend("<i class='fa fa-circle-o'></i>");
      $ar->add('预缴款','receivables?search=4&searchFields=type&orderBy=pd_scheduled&sortedBy=asc')->prepend("<i class='fa fa-circle-o'></i>");

      $ap = $funds->add('应付','payables')->prepend("<i class='fa fa-share'></i>");
      $ap->add('应付汇总','payables/summary')->prepend("<i class='fa fa-circle-o'></i>");
      $ap->add('应付商家','payables?search=1&searchFields=type&orderBy=pd_scheduled&sortedBy=asc')->prepend("<i class='fa fa-circle-o'></i>");
      $ap->add('应付资金方','payables?search=2&searchFields=type&orderBy=pd_scheduled&sortedBy=asc')->prepend("<i class='fa fa-circle-o'></i>");
      $customers = $menu->add('客户管理', ['class'=>'treeview']);
      $customers->prepend("<i class='fa fa-group'></i><span>")->append("</span><i class='fa fa-angle-left pull-right'></i>");
      $customers->add('新建客户','customers/create')->prepend("<i class='fa fa-circle-o'></i>");
      $customers->add('客户列表','customers')->prepend("<i class='fa fa-circle-o'></i>");
      $products = $menu->add('产品管理', ['class'=>'treeview']);
      $products->prepend("<i class='fa fa-th'></i><span>")->append("</span><i class='fa fa-angle-left pull-right'></i>");
      $products->add('产品列表','goodsMasters')->prepend("<i class='fa fa-circle-o'></i>");
      $partners = $menu->add('合作方管理', ['class'=>'treeview']);
      $partners->prepend("<i class='fa fa-user-plus'></i><span>")->append("</span><i class='fa fa-angle-left pull-right'></i>");
      $fund_partner=$partners->add('资金方','#')->prepend("<i class='fa fa-money'></i>");
      $fund_partner->add('资金方信息','funds')->prepend("<i class='fa fa-circle-o'></i>");
      $fund_partner->add('资金产品','fundproducts')->prepend("<i class='fa fa-circle-o'></i>");
      
      $merchant=$partners->add('商户','#')->prepend("<i class='fa fa-briefcase'></i>");
      $merchant->add('商户平台','merchants')->prepend("<i class='fa fa-circle-o'></i>");
      $merchant->add('商家列表','shops')->prepend("<i class='fa fa-circle-o'></i>");

  		$reports = $menu->add('统计报表', ['class'=>'treeview']);
      $reports->prepend("<i class='fa fa-area-chart'></i><span>")->append("</span><i class='fa fa-angle-left pull-right'></i>");
      $reports->add('Level 2','#')->prepend("<i class='fa fa-circle-o'></i>");
      $reports->add('Level 2','#')->prepend("<i class='fa fa-circle-o'></i>");
      if(Entrust::hasRole('admin')){
            $admins = $menu->add('系统设置', ['class'=>'treeview'])->active('/admin/*');
            $admins->prepend("<i class='fa fa-cog'></i><span>")->append("</span><i class='fa fa-angle-left pull-right'></i>");
            $admins->add('角色权限管理','admin/roles')->prepend("<i class='fa fa-circle-o'></i>")->active('/admin/roles');
            $admins->add('用户管理','#')->prepend("<i class='fa fa-circle-o'></i>");
      }
      		});
      
		return $next($request);

	}

}
