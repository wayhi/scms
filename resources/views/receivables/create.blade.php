@extends('layouts.app')
@section('htmlheader_title')
    receivable
@endsection

@section('contentheader_title')
    receivable

@endsection

@section('contentheader_description')
    receivable
@endsection
@section('main-content')
@include('flash::message')
@include('adminlte::common.errors')
    <div class="content">
        
        <div class="box box-info">
             <div class="box-header with-border">
              <h3 class="box-title">receivable</h3>
              
            </div>
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'receivables.store']) !!}

                              @include('receivables.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
