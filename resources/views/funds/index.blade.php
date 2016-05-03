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


<div class="row">
    <div class="col-xs-12">
        <!--div class="box"-->
            <div class="box-header">
                <h3 class="box-title">资金方列表</h3>
            
                <div class="box-tools">
                  <div class="btn-group pull-right">
                      <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        操作
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                        <li><a href="{!!route('funds.create')!!}">新增</a></li>
                       
                      </ul>
                    </div>
                  
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control pull-right" placeholder="姓名或电话">

                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                </div> 
            </div>   
        <div class="box box-primary">
            <div class="box-body">
                    @include('funds.table')
            </div>
        </div>
    <!--/div-->
</div>
</div>    
@endsection

