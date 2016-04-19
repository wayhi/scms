@extends('layouts.app')

@section('htmlheader_title')
	Platform Tools
@endsection

@section('contentheader_title')
信贷产品
@endsection

@section('contentheader_description')

@endsection

@section('main-content')
@include('flash::message')
<!--div class="col-md-10"-->
          <!-- Horizontal Form -->
       
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">客户联系</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
          {!!Form::open(array('action' => 'SmsController@store','class'=>'form-horizontal'))!!}  
          

            <div class="box-body">
               <div class="form-group">
                  {!!Form::label('send_to_number', '手机号码：',['class' => 'col-sm-2 control-label']);!!}
                  <div class="col-sm-6">
                    {!!Form::text('send_to_number','',['class' => 'form-control','id'=>'send_to_number',"autofocus"=>"autofocus"]);!!}
                  </div>
                </div>
               <div class="form-group">
                  {!!Form::label('send_to', '客户名称：',['class' => 'col-sm-2 control-label']);!!}
                  <div class="col-sm-6">
                    {!!Form::text('send_to_display','',['class' => 'form-control','id'=>'send_to_display','disabled']);!!}
                    {!!Form::hidden('send_to');!!}
                  </div>
                </div>
                <div class="form-group">
                  {!!Form::label('template_id', '短信模板：',['class' => 'col-sm-2 control-label']);!!}
                  <div class="col-sm-6">
                    {!!Form::radio('template_id','1',['class' => 'form-control']); !!} <span>所需资料</span>
                  </div>
                </div>             
             </div>
             <input type='hidden' id='customer_id' name='customer_id'>
            <div class="box-footer">
              <a href="/home" class="btn btn-default" role='button'>返回</a>
              <button type='submit' name='status' value='1' class="btn btn-success">发送短信</button>
              <button type='submit' name='status' value='2' class="btn btn-danger">客户拒绝</button>
              <button type='submit' name='status' value='3' class="btn btn-warning">没有应答</button>
            </div>
              
          {!! Form::close() !!} 

  </div>


<!--/div-->  

@endsection