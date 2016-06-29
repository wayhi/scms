@extends('layouts.app')
@section('htmlheader_title')
    订单管理
@endsection

@section('contentheader_title')
    订单管理

@endsection

@section('contentheader_description')
    订单信息
@endsection
@section('main-content')
@include('flash::message')
@include('adminlte::common.errors')
   
    <!--div class="content"-->
        


        <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">订单详情</a></li>
              <li><a href="#tab_2" data-toggle="tab">用户还款记录</a></li>
              <li><a href="#tab_3" data-toggle="tab">资金记录</a></li>
              <li><a href="#tab_4" data-toggle="tab">打印</a></li>
              <li><a href="#tab_5" data-toggle="tab">关联信息</a></li>
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
               <div class="row" style="padding-left: 10px">
                 @include('orders.show_fields')
                </div>
                <div class='form-group'>
                    <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>    
                </div>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="tab_2">
                <div class="row" style="padding-left: 10px; padding-right: 10px">
                 @include('orders.show_receivables')
                </div>
                <div class='form-group'>
                    <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
                </div>
              </div>
              
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
               
              </div>
              <!-- /.tab-pane -->
               <div class="tab-pane" id="tab_4">
                 <div class="row" style="padding-left: 10px; padding-right: 10px">
                  @include('orders.summary')
                 </div> 
              </div>
              <!-- /.tab-pane -->
               <div class="tab-pane" id="tab_5">
                <div class="row" style="padding-left: 10px; padding-right: 10px">
                    @include('orders.show_related')
                </div>
               </div> 
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
    <!--/div-->
@endsection
