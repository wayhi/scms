@extends('layouts.app')
@section('htmlheader_title')
    产品管理
@endsection

@section('contentheader_title')
    产品管理
@endsection

@section('contentheader_description')
    产品列表
@endsection
@section('main-content')
@include('flash::message')
@include('adminlte::common.errors')
  
   <div class="content">
       @include('adminlte::common.errors')
       <div class="box box-info">
           <div class="box-header with-border">
              <h3 class="box-title">产品编辑</h3>
              
            </div>
           <div class="box-body">
               <div class="row">
                  {!! Form::model($goodsMaster, ['route' => ['goodsMasters.update', $goodsMaster->id], 'method' => 'patch']) !!}

                    @include('goodsMasters.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection