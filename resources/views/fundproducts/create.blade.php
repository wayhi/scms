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
              <h3 class="box-title">资金产品创建</h3>
              
            </div>

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'fundproducts.store']) !!}
                    <input type='hidden' name='fund_id' value='1'>
                              @include('fundproducts.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
