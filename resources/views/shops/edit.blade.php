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

  
   <div class="content">
       @include('adminlte::common.errors')
       <div class="box box-info">
           <div class="box-header with-border">
              <h3 class="box-title">商家信息</h3>
              
            </div>
           <div class="box-body">
               <div class="row">
                  {!! Form::model($shops, ['route' => ['shops.update', $shops->id], 'method' => 'patch']) !!}

                    @include('shops.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection