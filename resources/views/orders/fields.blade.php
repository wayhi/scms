<!-- Order Number Field -->
<div class="form-group col-sm-4">
    {!! Form::label('order_number', '订单号:') !!}
    @if($mode==='editing' && isset($order))
        <p>{{ $order->order_number }}</p>
    @else 
        <!--creating mode-->
        {!! Form::text('order_number', null, ['class' => 'form-control']) !!}
    @endif
    
</div>

<!-- Agent Field -->
<div class="form-group col-sm-4">
    {!! Form::label('agent', '代理:') !!}
    @if($mode==='editing' && isset($order))
        <p>{!! $order->agent !!}</p>
    @else
        {!! Form::text('agent', null, ['class' => 'form-control']) !!}
    @endif    
</div>

<!-- Shop Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('shop_id', '关联商家:') !!}
    @if($mode==='editing' && isset($order))
        <p>{!! $order->shop->shop_name !!}</p>
    @else    
        {!! Form::text('shop_id', null, ['class' => 'form-control']) !!}
    @endif
</div>

<!-- Customer Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('customer_id', '申请人:') !!}
    @if($mode==='editing' && isset($order))
        <p>{!! $order->customer->name !!}</p>
    @else
        {!! Form::text('customer_id', null, ['class' => 'form-control']) !!}
    @endif    
</div>

<!-- Bankcard Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('bankcard_id', '关联银行卡:') !!}
    @if($mode==='editing' && isset($order))
        <p>@if(isset($order->bankcard)){!! $order->bankcard->bin.$order->bankcard->code !!}@endif</p>
    @else
        {!! Form::text('bankcard_id', null, ['class' => 'form-control']) !!}
    @endif    
</div>

<!-- Goods Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('goods_id', '易分期产品:') !!}
    @if($mode==='editing' && isset($order))
        <p>{!! $order->goods->goods_name !!}</p>
    @else
        {!! Form::select('goods_id', $goodslist,null, ['class' => 'form-control']) !!}
    @endif    
</div>

<!-- Terminal Type Field -->
<div class="form-group col-sm-4">
    {!! Form::label('terminal_type', '用户终端类型:') !!}
    @if($mode==='editing' && isset($order))
        <p>{!! $order->terminal_type !!}</p>
    @else
        {!! Form::select('terminal_type',['ios'=>'IOS APP','android'=>'Android APP','wechat'=>'微信','pc'=>'PC Web'],null, ['class' => 'form-control']) !!}
    @endif
    
</div>

<!-- Currency Field -->
<div class="form-group col-sm-4">
    {!! Form::label('currency', '币种:') !!}
    @if($mode==='editing' && isset($order))
        <p>{!! $order->currency !!}</p>
    @else
        {!! Form::select('currency',['CNY'=>'CNY','USD'=>'USD','HKD'=>'HKD','GBP'=>'GBP','JPY'=>'JPY'], null, ['class' => 'form-control']) !!}
    @endif
</div>

<!-- Apply Amount Field -->
<div class="form-group col-sm-4">
    {!! Form::label('apply_amount', '申请金额:') !!}
    @if($mode==='editing' && isset($order))
        <p>{!! $order->apply_amount !!}</p>
    @else
        {!! Form::text('apply_amount', null, ['class' => 'form-control']) !!}
    @endif    
</div>

<!-- Credit Amount Field -->
<div class="form-group col-sm-4">
    {!! Form::label('credit_given', '资方放款金额:') !!}
    {!! Form::text('credit_given', null, ['class' => 'form-control']) !!}
</div>

<!-- Platform Payout Field -->
<div class="form-group col-sm-4">
    {!! Form::label('platform_payout', '平台放款金额:') !!}
    {!! Form::text('platform_payout', null, ['class' => 'form-control']) !!}
</div>

<!-- Downpayment Amount Field -->
<div class="form-group col-sm-4">
    {!! Form::label('downpayment_amount', '预付款金额:') !!}
    {!! Form::text('downpayment_amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Repay Target Field -->
<div class="form-group col-sm-4">
    {!! Form::label('repay_target', '计划还款总计:') !!}
    {!! Form::text('repay_target', null, ['class' => 'form-control']) !!}
</div>

<!-- Repay Actual Field -->
<div class="form-group col-sm-4">
    {!! Form::label('repay_actual', '实际还款总计:') !!}
    {!! Form::text('repay_actual', null, ['class' => 'form-control']) !!}
</div>

<!-- Handling Fees Field -->
<div class="form-group col-sm-4">
    {!! Form::label('handling_fees', '平台手续费:') !!}
    {!! Form::text('handling_fees', null, ['class' => 'form-control']) !!}
</div>

<!-- Bank Charges Field -->
<div class="form-group col-sm-4">
    {!! Form::label('bank_charges', '转账手续费:') !!}
    {!! Form::text('bank_charges', null, ['class' => 'form-control']) !!}
</div>

<!-- Refund Amount Field -->
<div class="form-group col-sm-4">
    {!! Form::label('refund_amount', '退款金额:') !!}
    {!! Form::text('refund_amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Adjustment Amount Field -->
<div class="form-group col-sm-4">
    {!! Form::label('adjustment_amount', '调整金额:') !!}
    {!! Form::text('adjustment_amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Process Status Field -->
<div class="form-group col-sm-4">
    {!! Form::label('process_status', '申请状态:') !!}
    @if($mode==='editing' && isset($order))
        <p>{!! $order->process_status_text !!}</p>
    @endif    
</div>

<!-- Fund Status Field -->
<div class="form-group col-sm-4">
    {!! Form::label('fund_status', '资金状态:') !!}
    @if($mode==='editing' && isset($order))
        
        {!! Form::select('fund_status',[0=>'未申请',1=>'等待平台审核',2=>'等待资方审核',3=>'等待资方放款',4=>'等待平台放款',5=>'正常还款中',6=>'还款逾期',7=>'坏账处理',8=>'还款完成',9=>'拒绝放款',10=>'退款中'],null,['class'=>'form-control'])!!}
    @endif    
</div>

<!-- Risk Level Field -->
<div class="form-group col-sm-4">
    {!! Form::label('risk_level', '风险等级:') !!}
    {!! Form::select('risk_level', [1,2,3,4,5],null, ['class' => 'form-control']) !!}
</div>

<!-- Goods Info Field -->
<div class="form-group col-sm-4">
    {!! Form::label('goods_info', '产品信息:') !!}
    {!! Form::text('goods_info', null, ['class' => 'form-control']) !!}
</div>

<!-- Supporting Doc Field -->
<div class="form-group col-sm-4">
    {!! Form::label('supporting_docs', '支持文件:') !!}
    {!! Form::text('supporting_docs', null, ['class' => 'form-control']) !!}
</div>

<!-- Effective Date Field -->
<div class="form-group col-sm-4">
    {!! Form::label('effective_date', '订单生效日期:') !!}
    <div class="input-group date">
      <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
      </div>
      {!! Form::text('effective_date', null, ['class' => 'form-control','id'=>'datepicker']) !!}
    </div>
    
</div>

<!-- Memo Field -->
<div class="form-group col-sm-12">
    {!! Form::label('memo', '备注:') !!}
    {!! Form::text('memo', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary','name'=>'action']) !!}
    @if($order->process_status==1)
    {!! Form::submit('平台审核通过', ['class' => 'btn btn-success','name'=>'action']) !!}
    {!! Form::submit('拒绝', ['class' => 'btn btn-danger','name'=>'action']) !!}
    @endif
    @if($order->process_status==2)
    {!! Form::submit('已放款', ['class' => 'btn btn-success','name'=>'action']) !!}
    @endif
    @if($order->process_status==4)
    {!! Form::submit('还款完成', ['class' => 'btn btn-success','name'=>'action']) !!}
    
    @endif
    @if($order->process_status<=4 && $order->process_status>0)
    {!! Form::submit('订单取消', ['class' => 'btn btn-warning','name'=>'action']) !!}
    @endif
    <a href="{!! route('orders.index') !!}" class="btn btn-default">返回</a>
</div>
