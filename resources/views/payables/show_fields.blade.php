
<!-- Order Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('order_id', '订单号:') !!}
    <p><a target='_blank' href='/orders/{{$payable->order_id}}'>{!! $payable->order->order_number !!}</a></p>
</div>

<!-- Type Field -->
<div class="form-group col-sm-4">
    {!! Form::label('type', '付款对象:') !!}
    <p>{!! $payable->type_text !!}</p>
</div>

<!-- Shop Id Field -->
@if($payable->type==1)
<div class="form-group col-sm-4">
    {!! Form::label('shop_id', '关联商户:') !!}
    <p>{!! $payable->shop->shop_name !!}</p>
</div>
@endif
@if($payable->type==2)
<div class="form-group col-sm-4">
    {!! Form::label('fundproduct', '关联资金:') !!}
    <p>{!! $payable->fundproduct->product_name !!}</p>
</div>
@endif
<!-- Amount Scheduled Field -->
<div class="form-group col-sm-4">
    {!! Form::label('amount_scheduled', '计划付款金额:') !!}
    <p>{!! $payable->amount_scheduled !!}</p>
</div>

<!-- Amount Actual Field -->
<div class="form-group col-sm-4">
    {!! Form::label('amount_actual', '实际付款金额:') !!}
    <p>{!! $payable->amount_actual !!}</p>
</div>

<!-- Adjustment Amount Field -->
<div class="form-group col-sm-4">
    {!! Form::label('adjustment_amount', '调整金额:') !!}
    <p>{!! $payable->adjustment_amount !!}</p>
</div>

<!-- Serial No Field -->
<div class="form-group col-sm-4">
    {!! Form::label('serial_no', '期数:') !!}
    <p>{!! $payable->serial_no !!}</p>
</div>

<div class="form-group col-sm-4">
    {!! Form::label('repay_times', '总期数:') !!}
    <p>{!! $payable->fundproduct->repay_times !!}</p>
</div>

<!-- Pd Scheduled Field -->
<div class="form-group col-sm-4">
    {!! Form::label('pd_scheduled', '计划付款日期:') !!}
    <p>{!! $payable->pd_scheduled !!}</p>
</div>

<!-- Pd Actual Field -->
<div class="form-group col-sm-4">
    {!! Form::label('pd_actual', '实际付款日期:') !!}
    <p>{!! $payable->pd_actual !!}</p>
</div>



<!-- Memo Field -->
<div class="form-group col-sm-8">
    {!! Form::label('memo', '备注:') !!}
    <p>{!! $payable->memo !!}</p>
</div>

<!-- Status Field -->
<div class="form-group col-sm-4">
    {!! Form::label('status', '状态:') !!}
    <p>{!! $payable->status_text !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-4">
    {!! Form::label('created_at', '创建于:') !!}
    <p>{!! $payable->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-4">
    {!! Form::label('updated_at', '更新于:') !!}
    <p>{!! $payable->updated_at !!}</p>
</div>

<!-- Handled By Field -->
<div class="form-group col-sm-4">
    {!! Form::label('handled_by', '处理人员:') !!}
    <p>{!! $payable->handled_by !!}</p>
</div>

