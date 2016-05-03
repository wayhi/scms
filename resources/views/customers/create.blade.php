@extends('layouts.app')

@section('htmlheader_title')
	客户管理
@endsection

@section('contentheader_title')
客户管理

@endsection

@section('contentheader_description')
	
@endsection

@section('main-content')
@include('flash::message')
 <div class="content">          <!-- Horizontal Form -->
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">客户创建</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            {!!Form::open(array('action' => 'Customer\CustomerController@store','class'=>'form-horizontal'))!!}
            {!!Form::token();!!}
              <div class="box-body">
                <div class="form-group">
                  {!!Form::label('name', '姓名：',['class' => 'col-sm-2 control-label required']);!!}
                  <div class="col-sm-6">
                    {!!Form::text('name','',['class' => 'form-control','id'=>'name']);!!}
                  </div>
                </div>
                <div class="form-group">
                  {!!Form::label('gender', '性别：',['class' => 'col-sm-2 control-label']);!!} 

                  <div class="col-sm-6">
                    {!!Form::radio('gender','1',true);!!}<span> 男</span>
                    {!!Form::radio('gender','0');!!}<span> 女</span>
                  </div>
                </div>
                <div class="form-group">
                  {!!Form::label('id_number', '身份证号：',['class' => 'col-sm-2 control-label']);!!} 
                  <div class="col-sm-6">
                    {!!Form::text('id_number',null,['class' => 'form-control','id'=>'id_number']);!!}
                  </div>
                </div>

                <div class="form-group">
                  {!!Form::label('mobile_phone', '手机号：',['class' => 'col-sm-2 control-label']);!!} 
                  <div class="col-sm-6">
                    {!!Form::text('mobile_phone',null,['class' => 'form-control','id'=>'mobile_phone']);!!}
                  </div>
                </div>

                <div class="form-group">
                  {!!Form::label('wechat_account', '微信号：',['class' => 'col-sm-2 control-label']);!!} 
                  <div class="col-sm-6">
                    {!!Form::text('wechat_account',null,['class' => 'form-control','id'=>'wechat_account']);!!}
                  </div>
                </div>
                
                <div class="form-group">

                  {!!Form::label('tag_ids', '标记：',['class' => 'col-sm-2 control-label']);!!} 
                  <div class='col-sm-6'>
                    <select name="tag_ids[]" class="form-control select2" multiple="multiple" data-placeholder="选择标记" style="width: 100%;">
                      @foreach($tags as $tag)
                      <option value="{{$tag->id}}">{{$tag->title}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
               


              </div>
             

              <div class="box-footer">
                <a href="/customers" class="btn btn-default" role='button'>取消</a>
                <button type="submit" name='save' value='withCard' class="btn btn-warning">增加银行卡</button>
                <button type="submit" name='save' value='withoutCard' class="btn btn-info">保存</button>
              </div>


         {!! Form::close() !!}   


  </div>

</div>
<!--/div-->  

@endsection