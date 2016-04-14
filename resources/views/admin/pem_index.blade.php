@extends('layouts.app')

@section('htmlheader_title')
	Platform Administration
@endsection

@section('contentheader_title')
系统设置

@endsection

@section('contentheader_description')
	权限管理
@endsection


@section('main-content')
@include('layouts.partials.notifications')
	<div class="btn-group pull-right">
  <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    操作
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
    <li><a href="/admin/roles/create">新增</a></li>
   
  </ul>
</div>
<table class="table n_table">
	
        <thead>
            <tr class='warning'>
                <th>ID</th>
                <th>权限名称</th>
                <th>显示名称</th>
                <th>描述</th>
            </tr>
        </thead>
		<tbody>
			@foreach ($roles as $role)
			<tr>	
			<td>{{$role->id}}</td>
			<td><a href="">{{$role->name}}
			</a></td>
			<td>{{$role->display_name}}</td>
			<td>{{$role->description}}</td>
			
			</tr>
			
			@endforeach
		</tbody>
</table>





@endsection