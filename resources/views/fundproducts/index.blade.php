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

    <section class="content-header">
        <h1 class="pull-left">资金产品</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('fundproducts.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('fundproducts.table')
            </div>
        </div>
    </div>
@endsection

