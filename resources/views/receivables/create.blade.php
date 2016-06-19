@extends('layouts.app')
@section('htmlheader_title')
    应收账款
@endsection

@section('contentheader_title')
    应收账款
@endsection

@section('contentheader_description')
    应收
@endsection
@section('main-content')

@include('flash::message')
    <div class="content">
        
        <div class="box box-info">
             <div class="box-header with-border">
              <h3 class="box-title">应收账款</h3>
              
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
