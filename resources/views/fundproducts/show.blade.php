@extends('layouts.app')
@section('htmlheader_title')
    合作方管理
@endsection

@section('contentheader_title')
    合作方管理
@endsection

@section('contentheader_description')
    资金方
@endsection
@section('main-content')
@include('flash::message')
@include('adminlte::common.errors')

   
    <div class="content">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">资金产品信息</h3>
              
            </div>
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                  @include('fundproducts.show_fields')
                  
                </div>
                <div class='btn-group'>
                    <a href="{!! route('fundproducts.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection