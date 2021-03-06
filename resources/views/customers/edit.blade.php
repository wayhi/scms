@extends('layouts.app')
<script>
  function removeBkCard(card_id){
    //alert('ok');
    document.getElementById('bkcards_toremove').value += card_id+',';  

  }
</script>
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
              <h3 class="box-title">客户信息编辑</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            {!!Form::model($customer,array('action' => ['Customer\CustomerController@update',$customer->id],'class'=>'form-horizontal'))!!}
            <input type="hidden" name="_method" value="PATCH">
              <div class="box-body">
                <div class="form-group required">
                  {!!Form::label('name', '姓名：',['class' => 'col-sm-2 control-label']);!!}
                  <div class="col-sm-6">
                    {!!Form::text('name',null,['class' => 'form-control','id'=>'name']);!!}
                  </div>
                </div>
                <div class="form-group">
                  {!!Form::label('gender', '称谓：',['class' => 'col-sm-2 control-label']);!!} 

                  <div class="col-sm-6">
                    @if($customer->gender=='先生') <input name="gender" type="radio" value="1" id="gender" checked><span> 先生</span>
                    <input name="gender" type="radio" value="0" id="gender"><span> 女士 </span>
                    @elseif($customer->gender=='女士')
                    <input name="gender" type="radio" value="1" id="gender"><span> 先生 </span>
                    <input name="gender" type="radio" value="0" id="gender" checked><span> 女士 </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  {!!Form::label('id_number', '身份证号：',['class' => 'col-sm-2 control-label']);!!} 
                  <div class="col-sm-6">
                    {!!$customer->id_number!!}
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
                  {!!Form::label('activated', '有效：',['class' => 'col-sm-2 control-label']);!!} 
                  <div class="col-sm-6">
                    {!!Form::radio('activated','1')!!}<span>有效</span>{!!Form::radio('activated','0')!!}<span>无效</span>
                  </div>
                </div>

                <div class="form-group">
                 {!!Form::label('cards', '银行卡：',['class' => 'col-sm-2 control-label']);!!} 
                 <input type='hidden' id='bkcards_toremove' name='bkcards_toremove' value=''>
                 @foreach($customer->bankcards as $bankcard)
                 <div class="col-md-3">
                    <div class="box box-warning">
                      <div class="box-header with-border">
                        <h3 class="box-title">{!!$bankcard->bin!!}</h3>

                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="remove" onclick="javascript:removeBkCard({!!$bankcard->id!!});" /><i class="fa fa-times"></i>
                          </button>
                        </div>
                        <!-- /.box-tools -->
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        {!!$bankcard->code!!}
                      </div>
                      <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                  </div>
                  <!-- /.col -->
                  @endforeach

                </div>
                
                <div class="form-group">

                  {!!Form::label('tag_ids', '标记：',['class' => 'col-sm-2 control-label']);!!} 
                  <div class='col-sm-6'>
                     <select name="tag_ids[]" class="form-control select2" multiple="multiple" data-placeholder="选择标记" style="width: 100%;">
                      @foreach($tags as $tag)
                        <option value="{{$tag->id}}" @if(in_array($tag->id,$tags_selected_ids)) selected @endif > {{$tag->title}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
               


              </div>
             

              <div class="box-footer">
                <a href="javascript:history.go(-1);" class="btn btn-default" role='button'>取消</a>
                <button type="submit" name='save' value='withCard' class="btn btn-warning">增加银行卡</button>
                <button type="submit" name='save' value='withoutCard' class="btn btn-info">保存</button>
              </div>


         {!! Form::close() !!}   


  </div>


<!--/div-->  

@endsection