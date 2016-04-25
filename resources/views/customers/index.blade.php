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
              <h3 class="box-title">客户列表</h3>

              <div class="box-tools">
              <div class="btn-group pull-left">
				  <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				    操作
				    <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
				    <li><a href="/customers/create">新增</a></li>
				   
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
                  <th>客户名称</th>
                  <th>电话</th>
                  <th>建立时间</th>
                  </tr>
                @foreach ($customers as $customer)
				 <tr>	
				  <td>{{$customer->id}}</td>
				  <td><a href="/customers/{{$customer->id}}">{{$customer->name}}
				  </a></td>
				  <td>{{$customer->mobile_phone}}</td>
				  <td>{{$customer->created_at}}</td>
				
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