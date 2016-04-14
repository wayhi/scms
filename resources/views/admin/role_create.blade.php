@extends('layouts.app')

@section('htmlheader_title')
	Platform Administration
@endsection

@section('contentheader_title')
系统设置

@endsection

@section('contentheader_description')
	角色管理
@endsection

@section('main-content')
@include('flash::message')
<!--div class="col-md-10"-->
          <!-- Horizontal Form -->
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">角色创建</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            {!!Form::open(array('action' => 'Admin\RoleController@store','class'=>'form-horizontal'))!!}
              <div class="box-body">
                <div class="form-group">
                  {!!Form::label('name', '角色名称：',['class' => 'col-sm-2 control-label required']);!!}
                  <div class="col-sm-6">
                    {!!Form::text('name','',['class' => 'form-control','id'=>'name']);!!}
                  </div>
                </div>
                <div class="form-group">
                  {!!Form::label('display_name', '显示名称：',['class' => 'col-sm-2 control-label']);!!} 

                  <div class="col-sm-6">
                    {!!Form::text('display_name',null,['class' => 'form-control','id'=>'display_name']);!!}
                  </div>
                </div>
                <div class="form-group">
                  {!!Form::label('description', '描述：',['class' => 'col-sm-2 control-label']);!!} 
                  <div class="col-sm-6">
                    {!!Form::text('description',null,['class' => 'form-control','id'=>'description']);!!}
                  </div>
                </div>
                
                <div class="form-group">

                  {!!Form::label('permissions', '拥有权限：',['class' => 'col-sm-2 control-label']);!!} 
                  <div class='col-sm-6'>
                    <select name="permissions[]" class="form-control select2" multiple="multiple" data-placeholder="选择权限" style="width: 100%;">
                      @foreach($pems as $pem)
                      <option value="{{$pem->id}}">{{$pem->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
               


              </div>
             

              <div class="box-footer">
                <a href="/admin/roles" class="btn btn-default" role='button'>取消</a>
                <button type="submit" class="btn btn-info">保存</button>
              </div>


         {!! Form::close() !!}   


  </div>


<!--/div-->  

@endsection