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
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">应付明细</h3>
              
            </div>
            <div class="box-body">
               <div class="row" style="padding-left: 20px">
                 @include('payables.show_fields')
                  
                </div>
                <div class='btn-group'>
                    <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
                </div>
            </div>
        </div>
    </div>
@endsection
