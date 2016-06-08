
<!-- Order Number Field -->
<div class="form-group col-sm-4">
    {!! Form::label('order_number', '订单号:') !!}
    <p>{!! $order->order_number !!}</p>
</div>

<!-- Customer Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('customer_id', '申请人:') !!}
    <p>{!! $order->customer->name !!}</p>
</div>
<!-- Bankcard Id Field -->

<div class="form-group col-sm-4">
    {!! Form::label('bankcard_id', '关联银行卡') !!}
    @if(isset($order->bankcard)) <p>{!! $order->bankcard->bin.$order->bankcard->code !!}</p> 
    @else
    <p>N/A</p>
    @endif
</div>

<!-- Agent Field -->
<div class="form-group col-sm-4">
    {!! Form::label('agent', '代理:') !!}
    <p>{!! $order->agent !!}</p>
</div>

<!-- Shop Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('shop_id', '关联商家:') !!}
    <p>{!! $order->shop->shop_name !!}</p>
</div>

<!-- Goods Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('goods_id', '易分期产品:') !!}
    <p>{!! $order->goods->goods_name !!}</p>
</div>

<!-- Order Type Field -->
<div class="form-group col-sm-4">
    {!! Form::label('order_type', '产品类型:') !!}
    <p>{!! $order->goods->type !!}</p>
</div>

<!-- Apply Amount Field -->
<div class="form-group col-sm-4">
    {!! Form::label('apply_amount', '申请金额:') !!}
    <p>{!! $order->apply_amount !!}</p>
</div>

<!-- Currency Field -->
<div class="form-group col-sm-4">
    {!! Form::label('currency', '币种:') !!}
    <p>{!! $order->currency !!}</p>
</div>


<!-- Credit Amount Field -->
<div class="form-group col-sm-4">
    {!! Form::label('credit_given', '资方放款金额:') !!}
    <p>{!! $order->credit_given !!}</p>
</div>

<!-- Platform Payout Field -->
<div class="form-group col-sm-4">
    {!! Form::label('platform_payout', '平台支付金额:') !!}
    <p>{!! $order->platform_payout !!}</p>
</div>

<!-- Downpayment Amount Field -->
<div class="form-group col-sm-4">
    {!! Form::label('downpayment_amount', '预付款金额:') !!}
    <p>{!! $order->downpayment_amount !!}</p>
</div>

<!-- Repay Target Field -->
<div class="form-group col-sm-4">
    {!! Form::label('repay_target', '计划还款总额:') !!}
    <p>{!! $order->repay_target !!}</p>
</div>

<!-- Repay Actual Field -->
<div class="form-group col-sm-4">
    {!! Form::label('repay_actual', '实际还款总额:') !!}
    <p>{!! $order->repay_actual !!}</p>
</div>

<!-- Handling Fees Field -->
<div class="form-group col-sm-4">
    {!! Form::label('handling_fees', '平台手续费:') !!}
    <p>{!! $order->handling_fees !!}</p>
</div>

<!-- Bank Charges Field -->
<div class="form-group col-sm-4">
    {!! Form::label('bank_charges', '资金通道费用:') !!}
    <p>{!! $order->bank_charges !!}</p>
</div>

<!-- Refund Amount Field -->
<div class="form-group col-sm-4">
    {!! Form::label('refund_amount', '退款金额:') !!}
    <p>{!! $order->refund_amount !!}</p>
</div>

<!-- Adjustment Amount Field -->
<div class="form-group col-sm-4">
    {!! Form::label('adjustment_amount', '调整金额:') !!}
    <p>{!! $order->adjustment_amount !!}</p>
</div>

<!-- Process Status Field -->
<div class="form-group col-sm-4">
    {!! Form::label('process_status', '订单状态:') !!}
    <p>{!! $order->process_status_text !!}</p>
</div>

<!-- Fund Status Field -->
<div class="form-group col-sm-4">
    {!! Form::label('fund_status', '资金状态:') !!}
    <p>{!! $order->fund_status_text !!}</p>
</div>

<!-- Risk Level Field -->
<div class="form-group col-sm-4">
    {!! Form::label('risk_level', '风险等级:') !!}
    <p>{!! $order->risk_level !!}</p>
</div>


<!-- Supporting Doc Field -->
<div class="form-group col-sm-4">
    {!! Form::label('supporting_doc', '申请附件:') !!}
    <p>{!! $order->supporting_doc !!}</p>
</div>

<!-- Effective Date Field -->
<div class="form-group col-sm-4">
    {!! Form::label('effective_date', '订单生效日:') !!}
    <p>{!! $order->effective_date !!}</p>
</div>

<!-- Memo Field -->
<div class="form-group col-sm-4">
    {!! Form::label('memo', '备注：') !!}
    <p>{!! $order->memo !!}&nbsp</p>
</div>

<!-- Modified By Field -->
<div class="form-group col-sm-4">
    {!! Form::label('modified_by', '最后修改人:') !!}
    <p>{!! $order->modified_by !!}</p>
</div>

<!-- Ip Address Field >
<div class="form-group col-sm-4">
    {!! Form::label('ip_address', 'Ip 地址:') !!}
    <p>{!! $order->ip_address !!}</p>
</div-->

<!-- Created At Field -->
<div class="form-group col-sm-4">
    {!! Form::label('created_at', '创建日期:') !!}
    <p>{!! $order->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-4">
    {!! Form::label('updated_at', '更新日期:') !!}
    <p>{!! $order->updated_at !!}</p>
</div>

