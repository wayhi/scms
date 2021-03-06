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
@include('adminlte::common.errors')
    <div class="content">
        
        <div class="box box-info">
             <div class="box-header with-border">
              <h3 class="box-title">商户平台</h3>
              
            </div>
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'merchants.store']) !!}

                              @include('merchants.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('/plugins/plupload/js/plupload.full.min.js')}}"></script>
    @if(env('APP_ENV')=='local')
        <script type="text/javascript" src="{{asset('/js/upload.js')}}"></script>
    @else
        <script type="text/javascript" src="{{asset('/js/uploadcallback.js')}}"></script>
    @endif

@endsection
