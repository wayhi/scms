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
        <script>
            
        </script>
        <div class="box box-info">
             <div class="box-header with-border">
              <h3 class="box-title">订单详细</h3>
              <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">关联信息录入
              </button>
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

<script type="text/javascript" src="{{ asset('/plugins/plupload/js/plupload.full.min.js')}}"></script>
@if(env('APP_ENV')=='local')<script type="text/javascript" src="{{asset('/js/upload.js')}}"></script>
@else<script type="text/javascript" src="{{asset('/js/uploadcallback.js')}}"></script>
@endif    
@endsection
