<div class="form-group col-sm-4">
    {!! Form::label('order_id', '订单号:') !!}
    <p><a target='_blank' href="{{route('orders.show',$payable->order_id)}}">{!! $payable->order->order_number !!}</a></p>
</div>

<!-- Type Field -->
<div class="form-group col-sm-4">
    {!! Form::label('type', '付款对象:') !!}
    @if($payable->type==1)
    <p>{!! $payable->shop->shop_name !!}</p>
    @elseif($payable->type==2)
    <p>{!! $payable->fundproduct->product_name !!}</p>
    @endif
</div>

<!-- Serial No Field -->
<div class="form-group col-sm-4">
    {!! Form::label('serial_no', '期数/总期数:') !!}
    @if($payable->type==2)
    <p>{!! $payable->serial_no !!}/{!! $payable->fundproduct->repay_times !!}</p>
    @else
    N/A
    @endif
    
</div>

<!-- Amount Scheduled Field -->
<div class="form-group col-sm-4">
    {!! Form::label('amount_scheduled', '计划付款金额:') !!}
    <p>{!! $payable->amount_scheduled !!}</p>
</div>



<!-- Pd Scheduled Field -->
<div class="form-group col-sm-4">
    {!! Form::label('pd_scheduled', '计划付款日期:') !!}
    <p>{!! $payable->pd_scheduled !!}</p>
</div>

<!-- Amount Actual Field -->
<div class="form-group col-sm-4">
    {!! Form::label('amount_actual', '实际付款金额:') !!}
    <div class="input-group">
    {!! Form::text('amount_actual', null, ['class' => 'form-control']) !!}
    <span class="input-group-addon">元</i></span>
    </div>
</div>

<!-- Adjustment Amount Field -->
<div class="form-group col-sm-4">
    {!! Form::label('adjustment_amount', '调整金额:') !!}
    <div class="input-group">
    {!! Form::text('adjustment_amount', null, ['class' => 'form-control']) !!}
    <span class="input-group-addon">元</i></span>
    </div>
</div>


<!-- Pd Actual Field -->
<div class="form-group col-sm-4">
    {!! Form::label('pd_actual', '实际付款日期:') !!}
    
    <div class="input-group date">
      <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
      </div>
      {!! Form::text('pd_actual', null, ['class' => 'form-control','id'=>'datepicker']) !!}
    </div>
</div>

<div class="form-group col-sm-4">
    {!! Form::label('status', '状态:') !!}
    
    {!! Form::select('status',[0=>'未支付',1=>'处理中',2=>'已支付',3=>'逾期'],null,['class'=>'form-control'])!!}
</div>

<!-- Memo Field -->
<div class="form-group col-sm-12">
    {!! Form::label('memo', '备注:') !!}
    {!! Form::text('memo', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('payables.index') !!}" class="btn btn-default">取消</a>
</div>
