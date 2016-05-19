@extends('layouts.app')
@section('htmlheader_title')
    goods_master
@endsection

@section('contentheader_title')
    goods_master
@endsection

@section('contentheader_description')
    goods_master
@endsection
@section('main-content')
@include('flash::message')

  
   <div class="content">
       @include('adminlte::common.errors')
       <div class="box box-info">
           <div class="box-header with-border">
              <h3 class="box-title">goods_master</h3>
              
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