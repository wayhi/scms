@extends('layouts.app')
@section('htmlheader_title')
    应付账款
@endsection

@section('contentheader_title')
    应付账款
@endsection

@section('contentheader_description')
    应付账款
@endsection
@section('main-content')

@include('flash::message')
@include('adminlte::common.errors')
  
   <div class="content">
       @include('adminlte::common.errors')
       <div class="box box-info">
           <div class="box-header with-border">
              <h3 class="box-title">应付账款更新</h3>
              
            </div>
           <div class="box-body">
               <div class="row">
                  {!! Form::model($payable, ['route' => ['payables.update', $payable->id], 'method' => 'patch']) !!}

                    @include('payables.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection