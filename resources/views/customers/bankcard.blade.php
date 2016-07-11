@extends('layouts.app')

@section('htmlheader_title')
	Platform Administration
@endsection

@section('contentheader_title')
客户管理

@endsection

@section('contentheader_description')
	银行卡信息
@endsection

@section('main-content')
@include('flash::message')
<!--div class="col-md-10"-->
          <!-- Horizontal Form -->
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">银行卡创建</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            {!!Form::open(array('route' => 'customers.addbankcard','class'=>'form-horizontal'))!!}
           
              <div class="box-body">
                <div class="form-group">
                  {!!Form::label('name', '姓名：',['class' => 'col-sm-2 control-label required']);!!}
                  <div class="col-sm-6">
                    <span>{!!$name!!}</span>
                    {!!Form::hidden('customer_id',$customer_id)!!}
                     {!!Form::hidden('customer_name',$name)!!}
                  </div>
                </div>
                <div class="form-group">
                  {!!Form::label('code', '卡号：',['class' => 'col-sm-2 control-label']);!!} 

                  <div class="col-sm-6">
                    {!!Form::text('code',null,['class' => 'form-control']);!!}
                  </div>
                </div>

                <div class="form-group">
                  {!!Form::label('bin', '发卡行：',['class' => 'col-sm-2 control-label']);!!} 
                  <div class="col-sm-6">
                    {!!Form::text('bin',null,['class' => 'form-control','id'=>'bin']);!!}
                  </div>
                </div>

                <div class="form-group">
                  {!!Form::label('vaild_period', '有效期：',['class' => 'col-sm-2 control-label']);!!} 
                  <div class="col-sm-6">
                    <input type="text" name='vaild_period' class="form-control" data-inputmask="'alias': 'mm/yyyy'" data-mask>
                  </div>
                </div>

                <div class="form-group">
                  {!!Form::label('cvn2', 'CVN2：',['class' => 'col-sm-2 control-label']);!!} 
                  <div class="col-sm-6">
                    {!!Form::text('cvn2',null,['class' => 'form-control','id'=>'cvn2']);!!}
                  </div>
                </div>

                <div class="form-group">
                  {!!Form::label('contact_phone', '手机号：',['class' => 'col-sm-2 control-label']);!!} 
                  <div class="col-sm-6">
                    {!!Form::text('contact_phone',null,['class' => 'form-control','id'=>'contact_phone']);!!}
                  </div>
                </div>
                
                <div class="form-group">
                  {!!Form::label('memo', '备注：',['class' => 'col-sm-2 control-label']);!!} 
                  <div class="col-sm-6">
                    {!!Form::text('memo',null,['class' => 'form-control','id'=>'memo']);!!}
                  </div>
                </div>

                
               


              </div>
             

              <div class="box-footer">
                <a href="/customers" class="btn btn-default" role='button'>取消</a>
                
                <button type="submit" class="btn btn-info">保存</button>
              </div>


         {!! Form::close() !!}   


  </div>


<!--/div-->  

@endsection