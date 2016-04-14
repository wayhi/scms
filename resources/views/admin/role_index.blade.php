@extends('layouts.app')

@section('htmlheader_title')
	Platform Administration
@endsection

@section('contentheader_title')
系统设置

@endsection

@section('contentheader_description')
	角色管理
@endsection


@section('main-content')
@include('flash::message')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">角色列表</h3>

              <div class="box-tools">
              <div class="btn-group pull-left">
				  <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				    操作
				    <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
				    <li><a href="/admin/roles/create">新增</a></li>
				   
				  </ul>
				</div>

                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>角色名称</th>
                  <th>显示名称</th>
                  <th>描述</th>
                  </tr>
                @foreach ($roles as $role)
				 <tr>	
				  <td>{{$role->id}}</td>
				  <td><a href="/admin/roles/{{$role->id}}">{{$role->name}}
				  </a></td>
				  <td>{{$role->display_name}}</td>
				  <td>{{$role->description}}</td>
				
				</tr>
			
			@endforeach
               
              </table>

            </div>
            <!-- /.box-body -->
          </div>
          {!! $links !!}
          <!-- /.box -->
        </div>
      </div>



@endsection