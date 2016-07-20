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
              <li @if($active_pane==1)class="active"@endif><a href="#tab_1" data-toggle="tab">贷前应收汇总</a></li>
              <li @if($active_pane==2)class="active"@endif><a href="#tab_2" data-toggle="tab">用户应还汇总</a></li>
            </ul>
            <div class="tab-content">
             
              <div @if($active_pane==1) class="tab-pane active" @else class="tab-pane" @endif id="tab_1">
              {!! Form::open(['route' => 'receivables.summary_results']) !!}
              {!!Form::hidden('start_date','',['id'=>'start_date'])!!}
              {!!Form::hidden('end_date','',['id'=>'end_date'])!!}
               <div class="row" style="padding-left: 10px">
                      <div class="form-group col-sm-4">
                            {!! Form::label('summary_date_1','汇总期间') !!}
                            <div class="input-group">
                              <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                                <span>
                                  <i class="fa fa-calendar"></i> 选择日期
                                </span>
                                <i class="fa fa-caret-down"></i>
                              </button>
                            </div>
                            
                      </div>

                      <div class="form-group col-sm-4">
                            {!! Form::label('merchant_id_1', '所属商户平台') !!}
                            {!! Form::select('merchant_id_1', $merchants_list, $merchant_id, ['class' => 'form-control']) !!}
                      </div>
                      <div class="form-group col-sm-2">
                        <br>
                        {!! Form::submit('贷前应收汇总', ['class' => 'btn btn-primary ','name'=>'action']) !!}

                      </div>
               </div>
                {!! Form::close() !!} 
              </div>
              <!-- /.tab-pane -->
             
             
              <div @if($active_pane==2) class="tab-pane active" @else class="tab-pane" @endif id="tab_2">
              {!! Form::open(['route' => 'receivables.summary_results']) !!}
              {!!Form::hidden('start_date_2','',['id'=>'start_date_2'])!!}
              {!!Form::hidden('end_date_2','',['id'=>'end_date_2'])!!}
              
                <div class="row" style="padding-left: 10px">
                  <div class="form-group col-sm-4">
                            {!! Form::label('summary_date_2','汇总期间') !!}
                            <div class="input-group">
                              <button type="button" class="btn btn-default pull-right" id="daterange-btn2">
                                <span>
                                  <i class="fa fa-calendar"></i> 选择日期
                                </span>
                                <i class="fa fa-caret-down"></i>
                              </button>
                            </div>
                            
                      </div>

                  <div class="form-group col-sm-4">
                    {!! Form::label('merchant_id_2','所属商户平台') !!}
                    {!! Form::select('merchant_id_2', $merchants_list,$merchant_id,['class' => 'form-control']) !!}
                  </div>
                      <div class="form-group col-sm-2">
                        <br>
                        {!! Form::submit('用户应还汇总', ['class' => 'btn btn-primary ','name'=>'action']) !!}

                      </div>    
                </div> 
                {!! Form::close() !!}      
              </div>
              {!! Form::open(['route' => 'receivables.summary_results']) !!}
               <table class="table table-responsive" id="receivables-summary">

                    <thead>
                        <th><input type='checkbox' id='ar_chk_all' checked></th>
                        <th>订单号</th>
                        <th>易分期产品</th>
                        <th>类型</th>
                        <th>商户平台</th>
                        <th>计划金额</th>
                        <th>计划日期</th>
                        <th>状态</th>
                    </thead>
                    <tbody>
                        @if($results)

                            @foreach($results as $result)
                            <tr>
                            <td><input type='checkbox' id='ar_chk[]' name='ar_chk[]' value='{{$result->id}}' checked></td>
                            <td><a href='/orders/{{$result->order->id}}' target='_blank'>{{$result->order->order_number}}</a></td>
                            <td>{{$result->goods->goods_name}}</td>
                            <td>{{$result->type_text}}
                            <td>{{$result->shop->merchant->merchant_name}}</td>
                            <td>{{$result->amount_scheduled }}
                            <input type="hidden" name="{{$result->id}}" id="{{$result->id}}" value="{{$result->amount_scheduled}}">
                            </td>
                            <td>{{$result->pd_scheduled }}</td>
                            <td>{{$result->status_text }}</td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                Total Amount: @if(isset($amount_sum))
                {{Form::text('amount_sum',$amount_sum,['disabled','id'=>'amount_sum'])}}
                {{Form::hidden('total_amount',$amount_sum)}}
                @endif
                {!! Form::submit('收讫', ['class' => 'btn btn-success btn-sm ','name'=>'action']) !!}
                {!! Form::close() !!}
              <!-- /.tab-pane -->
            </div>
          <!-- nav-tabs-custom -->
          </div>
    <!--/div--> 
               
            
            <!-- /.tab-content -->
    
@endsection
