@extends('layouts.app')

@section('htmlheader_title')
	Platform Administration
@endsection

@section('contentheader_title')
客户管理

@endsection

@section('contentheader_description')
	客户查询
@endsection


@section('main-content')
@include('flash::message')
{!!Form::open(array('route' => 'customers.search','class'=>'form-horizontal'))!!}
                
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">查询结果</h3>

              <div class="box-tools">
              
              
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
                <tr class='warning'>
                  <th>ID</th>
                  <th>客户名称</th>
                  <th>电话</th>
                  <th>建立时间</th>
                  </tr>
                @foreach ($customers as $customer)
          				 @if($customer->activated)
                   <tr>	
                   @else
                   <tr class='danger'>
                   @endif
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
 {!!Form::close();!!}


@endsection