@extends('layouts.app')
@section('htmlheader_title')
    应收账款
@endsection

@section('contentheader_title')
    应收账款汇总
@endsection

@section('contentheader_description')
    应收汇总
@endsection
@section('main-content')

@include('flash::message')


     <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">贷前应收汇总</a></li>
              <li><a href="#tab_2" data-toggle="tab">用户还款汇总</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
               <div class="row" style="padding-left: 10px">
                {!! Form::open(['route' => 'receivables.summary_results']) !!}

                      <div class="form-group col-sm-4">
                            {!! Form::label('summary_date','汇总期间') !!}
                            <div class="input-group">
                              <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                                <span>
                                  <i class="fa fa-calendar"></i> 选择日期
                                </span>
                                <i class="fa fa-caret-down"></i>
                              </button>
                            </div>
                            {!!Form::hidden('start_date','',['id'=>'start_date'])!!}
                            {!!Form::hidden('end_date','',['id'=>'end_date'])!!}
                      </div>

                      <div class="form-group col-sm-4">
                            {!! Form::label('merchant_id', '所属商户') !!}
                            {!! Form::select('merchant_id', $merchants_list, $merchant_id, ['class' => 'form-control select2']) !!}
                      </div>
                      <div class="form-group col-sm-2">
                        <br>
                        {!! Form::submit('汇总', ['class' => 'btn btn-primary ','name'=>'action']) !!}
                      </div>

                    {!! Form::close() !!}
               </div>

              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="tab_2">
                <div class="row" style="padding-left: 10px; padding-right: 10px">
                
                
                
                </div>
                <div class='form-group'>
                    <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
                </div>
              </div>
              
              
              <!-- /.tab-pane -->
            
          <!-- nav-tabs-custom -->
    <!--/div-->
                <table class="table table-responsive" id="receivables-summary">
                    <thead>
                        <th>订单号</th>
                        <th>易分期产品</th>
                        <th>类型</th>
                        <th>商户平台</th>
                        <th>计划收取金额</th>
                        <th>计划收取日期</th>
                        <th>状态</th>
                    </thead>
                    <tbody>
                        @if($results)

                            @foreach($results as $result)
                            <tr>
                            <td>{{$result->order->order_number}}</td>
                            <td>{{$result->goods->goods_name}}</td>
                            <td>{{$result->type_text}}
                            <td>{{$result->shop->merchant->merchant_name}}</td>
                            <td>{{$result->amount_scheduled }}</td>
                            <td>{{$result->pd_scheduled }}</td>
                            <td>{{$result->status_text }}</td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                Total Amount: @if(isset($amount_sum)){{$amount_sum}}@endif
            </div>
            <!-- /.tab-content -->
     </div>
@endsection
