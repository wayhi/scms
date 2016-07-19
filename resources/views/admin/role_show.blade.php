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
              <h3 class="box-title">角色信息</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            
              <div class="box-body">
                <div class="form-group">
                  {!!Form::label('name', '角色名称：',['class' => 'col-sm-2 control-label']);!!}
                  
                    {!!$role->name!!}
                  
                </div>
                <div class="form-group">
                  {!!Form::label('display_name', '显示名称：',['class' => 'col-sm-2 control-label']);!!} 

                  
                    {!!$role->display_name!!}
                  
                </div>
                <div class="form-group">
                  {!!Form::label('description', '描述：',['class' => 'col-sm-2 control-label']);!!} 
                  
                  &nbsp{!!$role->description!!}
                  
                </div>
                
                <div class="form-group">
                 {!!Form::label('permission', '权限：',['class' => 'col-sm-2 control-label']);!!} 
                 
                    @foreach($pems as $pem)
                     {{$pem->display_name}};
                    @endforeach
                  
                </div>
               


              </div>
             
              <div class="form-group ">
                <div class="box-footer">
                  <a href="/admin/roles" class="btn btn-default" role='button'>取消</a>
                  <a href="{!! URL::route('admin.roles.edit', array('role' => $role->id)) !!}" class="btn btn-info">编辑</a>
                </div>
              </div>
 


  </div>


<!--/div-->  

@endsection