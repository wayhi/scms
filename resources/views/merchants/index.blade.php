@extends('layouts.app')
@section('htmlheader_title')
    合作方管理
@endsection

@section('contentheader_title')
    合作方管理
@endsection

@section('contentheader_description')
    商户
@endsection
@section('main-content')

@include('flash::message')
<script>
  function search(){
    window.location.href='/merchants?search=' + document.getElementsByName('table_search')[0].value;
  }
</script>

<div class="row">
    <div class="col-xs-12">
        <!--div class="box"-->
            <div class="box-header">
                <h3 class="box-title">商户平台</h3>
            
                <div class="box-tools">
                  <div class="btn-group pull-right">
                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      操作
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                      <li><a href="{!!route('merchants.create')!!}">新增</a></li>
                    </ul>
                  </div>
                  
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control pull-right" placeholder="编号或名称">

                      <div class="input-group-btn">
                        <a type="button" href='javascript:search();' class="btn btn-primary"><i class="fa fa-search"></i></a>
                      </div>
                    </div>
                </div> 
            </div>   
        <div class="box box-primary">
            <div class="box-body">
                    @include('merchants.table')
            </div>
        </div>
    <!--/div-->
    {!!$links!!}
</div>
</div>    
@endsection



