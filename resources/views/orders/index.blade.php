@extends('layouts.app')
@section('htmlheader_title')
    订单管理
@endsection

@section('contentheader_title')
    订单管理

@endsection

@section('contentheader_description')
    订单列表
@endsection
@section('main-content')
@include('flash::message')
@include('adminlte::common.errors')
<script>
  function search(){
    window.location.href='/orders?search=' + document.getElementsByName('table_search')[0].value;
  }
</script>

<div class="row">
    <div class="col-xs-12">
        <!--div class="box"-->
            <div class="box-header">
                <h3 class="box-title">所有订单</h3>
                <a class="btn btn-primary btn-sm" href="{!!route('orders.create')!!}">新增</a> 
                <div class="box-tools">
                    
                      
                    <div class="input-group input-group-sm" style="width: 250px;">
                      <input type="text" name="table_search" class="form-control pull-right" placeholder="编号或名称">
                      <div class="input-group-btn">
                        <a type="button" href='javascript:search();' class="btn btn-primary"><i class="fa fa-search"></i></a>
                      </div>

                    </div>

                </div> 
            </div> 
        <div class="box box-primary">
            <div class="box-body">
                    @include('orders.table')
            </div>
        </div>
        {!!$links!!}
    <!--/div-->
</div>
</div>    
@endsection



