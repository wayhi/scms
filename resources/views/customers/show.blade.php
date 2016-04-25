@extends('layouts.app')

@section('htmlheader_title')
	Platform Administration
@endsection

@section('contentheader_title')
客户管理

@endsection

@section('contentheader_description')
	
@endsection

@section('main-content')
@include('flash::message')
<!--div class="col-md-10"-->
          <!-- Horizontal Form -->
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">客户信息</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            
              <div class="box-body">
                <div class="form-group">
                  {!!Form::label('name', '客户姓名：',['class' => 'col-sm-2 control-label']);!!}
                  
                    {!!$customer->name!!}
                  
                </div>
                <div class="form-group">
                  {!!Form::label('gender', '称谓：',['class' => 'col-sm-2 control-label']);!!} 
                  
                    {!!$customer->gender!!}
                  
                </div>
                <div class="form-group">
                  {!!Form::label('description', '身份证号：',['class' => 'col-sm-2 control-label']);!!} 
                  
                  &nbsp{!!$customer->id_number!!}
                  
                </div>

                <div class="form-group">
                  {!!Form::label('mobile_phone', '手机号：',['class' => 'col-sm-2 control-label']);!!} 
                  
                  &nbsp{!!$customer->mobile_phone!!}
                  
                </div>

                <div class="form-group">
                  {!!Form::label('wechat_account', '微信号：',['class' => 'col-sm-2 control-label']);!!} 
                  
                  &nbsp{!!$customer->wechat_account!!}
                  
                </div>
                
                <div class="form-group">
                 {!!Form::label('cards', '银行卡：',['class' => 'col-sm-2 control-label']);!!} 
                 
                 @foreach($customer->bankcards as $bankcard)
                     <span class="badge bg-light-blue">{{$bankcard->bin.'-'.$bankcard->code}}</span>
                    @endforeach
                  <br>
                </div>

                <div class="form-group">
                 {!!Form::label('tags', '标记：',['class' => 'col-sm-2 control-label']);!!} 
                 
                 
                    @foreach($customer->tags as $tag)
                     <span class="badge bg-yellow">{{$tag->title}}</span>
                    @endforeach
                  
                  
                </div>

                
               


              </div>
             
              <div class="form-group ">
                <div class="box-footer">
                  <a href="/customers" class="btn btn-default" role='button'>取消</a>
                  <a href="{!! URL::route('customers.edit', array('customer' => $customer->id)) !!}" class="btn btn-info">编辑</a>
                </div>
              </div>
 


  </div>


<!--/div-->  

@endsection