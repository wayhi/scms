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
       @include('adminlte::common.errors')
       <div class="box box-info">
           <div class="box-header with-border">
              <h3 class="box-title">订单修改</h3>
              
            </div>
           <div class="box-body">
               <div class="row">
                  {!! Form::model($order, ['route' => ['orders.update', $order->id], 'method' => 'patch']) !!}

                    @include('orders.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection