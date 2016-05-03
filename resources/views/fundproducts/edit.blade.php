@extends('layouts.app')

@section('content')
   <section class="content-header">
           <h1>
               FundProduct
           </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">

           <div class="box-body">
               <div class="row">
                   {!! Form::model($fundproduct, ['route' => ['fundproducts.update', $fundproduct->id], 'method' => 'patch']) !!}

                    @include('fundproducts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection