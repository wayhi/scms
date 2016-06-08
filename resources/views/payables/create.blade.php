@extends('layouts.app')
@section('htmlheader_title')
    payable
@endsection

@section('contentheader_title')
    payable

@endsection

@section('contentheader_description')
    payable
@endsection
@section('main-content')
@include('flash::message')
@include('adminlte::common.errors')
    <div class="content">
        
        <div class="box box-info">
             <div class="box-header with-border">
              <h3 class="box-title">payable</h3>
              
            </div>
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'payables.store']) !!}

                              @include('payables.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
