<?php


namespace App\Http\Middleware;

use Closure,Menu;


class MenuBar
{
	public function handle($request, Closure $next)
    {
		Menu::make('sideBar', function($menu){

  		
      $dashboard = $menu->add('Dashboard','home');
      $dashboard->prepend("<i class='fa fa-dashboard'></i><span>")->append("</span>");

      $orders = $menu->add('订单管理',['class'=>'treeview']);
      $orders->prepend("<i class='fa fa-list'></i><span>")->append("</span><i class='fa fa-angle-left pull-right'></i>");
      $orders->add('Level 2','#')->prepend("<i class='fa fa-circle-o'></i>");
      $orders->add('Level 2','#')->prepend("<i class='fa fa-circle-o'></i>");

  		$funds = $menu->add('资金管理', ['class'=>'treeview']);
      $funds->prepend("<i class='fa fa-credit-card'></i><span>")->append("</span><i class='fa fa-angle-left pull-right'></i>");
      $funds->add('Level 2','#')->prepend("<i class='fa fa-circle-o'></i>");
      $funds->add('Level 2','#')->prepend("<i class='fa fa-circle-o'></i>");

      $customers = $menu->add('客户管理', ['class'=>'treeview']);
      $customers->prepend("<i class='fa fa-group'></i><span>")->append("</span><i class='fa fa-angle-left pull-right'></i>");
      $customers->add('Level 2','#')->prepend("<i class='fa fa-circle-o'></i>");
      $customers->add('Level 2','#')->prepend("<i class='fa fa-circle-o'></i>");

      $products = $menu->add('产品管理', ['class'=>'treeview']);
      $products->prepend("<i class='fa fa-th'></i><span>")->append("</span><i class='fa fa-angle-left pull-right'></i>");
      $products->add('Level 2','#')->prepend("<i class='fa fa-circle-o'></i>");
      $products->add('Level 2','#')->prepend("<i class='fa fa-circle-o'></i>");

      $partners = $menu->add('合作方管理', ['class'=>'treeview']);
      $partners->prepend("<i class='fa fa-user-plus'></i><span>")->append("</span><i class='fa fa-angle-left pull-right'></i>");
      $partners->add('Level 2','#')->prepend("<i class='fa fa-circle-o'></i>");
      $partners->add('Level 2','#')->prepend("<i class='fa fa-circle-o'></i>");


  		$reports = $menu->add('统计报表', ['class'=>'treeview']);
      $reports->prepend("<i class='fa fa-area-chart'></i><span>")->append("</span><i class='fa fa-angle-left pull-right'></i>");
      $reports->add('Level 2','#')->prepend("<i class='fa fa-circle-o'></i>");
      $reports->add('Level 2','#')->prepend("<i class='fa fa-circle-o'></i>");

      $admins = $menu->add('系统设置', ['class'=>'treeview'])->active('/admin/*');
      $admins->prepend("<i class='fa fa-cog'></i><span>")->append("</span><i class='fa fa-angle-left pull-right'></i>");
      $admins->add('角色权限管理','admin/roles')->prepend("<i class='fa fa-circle-o'></i>")->active('/admin/roles');
      $admins->add('Level 2','#')->prepend("<i class='fa fa-circle-o'></i>");

		});

		return $next($request);

	}

}
