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
    <div class="content">
        
        <div class="box box-info">
             <div class="box-header with-border">
              <h3 class="box-title">订单详细</h3>
              
            </div>
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'orders.store']) !!}

                              @include('orders.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
