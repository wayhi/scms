<!-- Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('id', '产品ID:') !!}
    <p>{!! $goodsMaster->id !!}</p>
</div>

<!-- Type Field -->
<div class="form-group col-sm-4">
    {!! Form::label('type', '类型:') !!}
    <p>{!! $goodsMaster->type_text !!}</p>
</div>

<!-- Goods Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('goods_name', '产品名称:') !!}
    <p>{!! $goodsMaster->goods_name !!}</p>
</div>

<!-- Goods Spec Field -->
<div class="form-group col-sm-4">
    {!! Form::label('goods_spec', '产品描述:') !!}
    <p>{!! $goodsMaster->goods_spec !!}</p>
</div>

<!-- Shop Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('shop_id', '关联商户:') !!}
    <p>{!! $goodsMaster->merchant->merchant_name !!}</p>
</div>

<!-- Fund Product Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('fund_product_id', '关联资金:') !!}
    <p>{!! $goodsMaster->fundproduct->product_name !!}</p>
</div>

<!-- Platform Approve Field -->
<div class="form-group col-sm-4">
    {!! Form::label('platform_approve', '是否平台审批:') !!}
    <p>{!! $goodsMaster->platformapprove_text !!}</p>
</div>

<!-- Payout Rate Field -->
<div class="form-group col-sm-4">
    {!! Form::label('payout_rate', '平台支付商家比率:') !!}
    <p>{!! $goodsMaster->payout_rate !!}%</p>
</div>

<!-- Downpayment Rate Field -->
<div class="form-group col-sm-4">
    {!! Form::label('downpayment_rate', '预缴款比率:') !!}
    <p>{!! $goodsMaster->downpayment_rate !!}%</p>
</div>

<!-- Downpayment Amount Field -->
<div class="form-group col-sm-4">
    {!! Form::label('downpayment_amount', '预缴款金额:') !!}
    <p>{!! $goodsMaster->downpayment_amount !!}</p>
</div>

<!-- Handling Fee Rate Field -->
<div class="form-group col-sm-4">
    {!! Form::label('handling_fee_rate', '手续费比率:') !!}
    <p>{!! $goodsMaster->handling_fee_rate !!}%</p>
</div>

<!-- Handling Fee Field -->
<div class="form-group col-sm-4">
    {!! Form::label('handling_fee', '手续费金额:') !!}
    <p>{!! $goodsMaster->handling_fee !!}</p>
</div>

<!-- Repay Times Field -->
<div class="form-group col-sm-4">
    {!! Form::label('repay_times', '还款期数:') !!}
    <p>{!! $goodsMaster->repay_times !!}期</p>
</div>

<!-- Repay Pct Field -->
<div class="form-group col-sm-4">
    {!! Form::label('repay_pct', '每期还款比率:') !!}
    <p>{!! $goodsMaster->repay_pct !!}%</p>
</div>

<!-- Repay Amount Field -->
<div class="form-group col-sm-4">
    {!! Form::label('repay_amount', '每期还款金额:') !!}
    <p>{!! $goodsMaster->repay_amount !!}</p>
</div>

<!-- Order Limit Field -->
<div class="form-group col-sm-4">
    {!! Form::label('order_limit', '每订单限额:') !!}
    <p>{!! $goodsMaster->order_limit !!}</p>
</div>

<!-- Blocked On Creation Field -->
<div class="form-group col-sm-4">
    {!! Form::label('blocked_on_creation', '首期预冻结:') !!}
    <p>{!! $goodsMaster->blocked_on_creation_text !!}</p>
</div>

<!-- Refund Available Field -->
<div class="form-group col-sm-4">
    {!! Form::label('refund_available', '可否退款:') !!}
    <p>{!! $goodsMaster->refund_available_text !!}</p>
</div>

<!-- Trade Time Start Field -->
<div class="form-group col-sm-4">
    {!! Form::label('trade_time_start', '交易时间始:') !!}
    <p>{!! $goodsMaster->trade_time_start !!}</p>
</div>

<!-- Trade Time End Field -->
<div class="form-group col-sm-4">
    {!! Form::label('trade_time_end', '交易时间止:') !!}
    <p>{!! $goodsMaster->trade_time_end !!}</p>
</div>

<!-- Activated Field -->
<div class="form-group col-sm-4">
    {!! Form::label('activated', '是否有效:') !!}
    <p>{!! $goodsMaster->activated_text !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-4">
    {!! Form::label('created_at', '创建时间:') !!}
    <p>{!! $goodsMaster->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-4">
    {!! Form::label('updated_at', '更新时间:') !!}
    <p>{!! $goodsMaster->updated_at !!}</p>
</div>

