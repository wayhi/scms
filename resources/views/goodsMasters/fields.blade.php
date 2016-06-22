
<!-- Type Field -->
<div class="form-group col-sm-4">
    {!! Form::label('type', '类型:') !!}
    {!! Form::select('type', ['1' => '保险', '2' => '社区','3'=>'信用贷','4'=>'消费贷'], null, ['class' => 'form-control']) !!}
</div>

<!-- Goods Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('goods_name', '产品名称:') !!}
    {!! Form::text('goods_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Goods Spec Field 
<div class="form-group col-sm-4">
    {!! Form::label('goods_spec', '产品描述:') !!}
    {!! Form::text('goods_spec', null, ['class' => 'form-control']) !!}
</div-->

<!-- Shop Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('merchant_id', '商户平台:') !!}
    {!! Form::select('merchant_id', $merchants, null, ['class' => 'form-control']) !!}
</div>

<!-- Fund Product Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('fund_product_id', '资金产品:') !!}
    {!! Form::select('fund_product_id',  $fundproducts, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-4">
    {!! Form::label('repay_way', '还款途径:') !!}
    {!! Form::select('repay_way',[0=>'无限制',1=>'信用卡预授权',2=>'银行卡代扣',3=>'线下还款'], null, ['class' => 'form-control']) !!}
</div>

<!-- Platform Approve Field -->
<div class="form-group col-sm-4">
    {!! Form::label('platform_approve', '平台是否审批:') !!}<br>
    <label class="radio-inline">
        {!! Form::radio('platform_approve','1', null) !!} 是
    </label>
    <label class="radio-inline">
        {!! Form::radio('platform_approve','0', null) !!} 否
    </label><br><br>
</div>



<!-- Payout Rate Field -->
<div class="form-group col-sm-4">
    {!! Form::label('payout_rate', '平台支付商家比率:') !!}
    <div class="input-group">
        {!! Form::text('payout_rate',null, ['class' => 'form-control']) !!}
        <span class="input-group-addon">%</span>
    </div>
</div>

<div class="form-group col-sm-4">
    {!! Form::label('fund_rate', '资金方支付比率:') !!}
    <div class="input-group">
        {!! Form::text('fund_rate',null, ['class' => 'form-control']) !!}
        <span class="input-group-addon">%</span>
    </div>
</div>

<div class="form-group col-sm-4">
    {!! Form::label('downpayment_rate', '预缴款比率:') !!}
    <div class="input-group">
        {!! Form::text('downpayment_rate', 0, ['class' => 'form-control']) !!}
        <span class="input-group-addon">%</span>
    </div>
</div>

<div class="form-group col-sm-4">
    {!! Form::label('downpayment_amount', '预缴款金额:') !!}
    {!! Form::text('downpayment_amount', 0, ['class' => 'form-control']) !!}    
</div>


<!-- Handling Fee Rate Field -->
<div class="form-group col-sm-4">
    {!! Form::label('handling_fee_rate', '平台手续费比率:') !!}
    <div class="input-group">
        {!! Form::text('handling_fee_rate', null, ['class' => 'form-control']) !!}
        <span class="input-group-addon">%</span>
    </div>
</div>

<!-- Handling Fee Rate Field -->
<div class="form-group col-sm-4">
    {!! Form::label('handling_fee', '平台手续费金额:') !!}
    {!! Form::text('handling_fee', null, ['class' => 'form-control']) !!}
</div>

<!-- Repay Times Field -->
<div class="form-group col-sm-4">
    {!! Form::label('repay_times', '还款期数:') !!}
    {!! Form::number('repay_times', null, ['class' => 'form-control']) !!}
</div>

<!-- Repay Pct Field -->
<div class="form-group col-sm-4">
    {!! Form::label('repay_pct', '每期还款比率:') !!}
    <div class="input-group">
        {!! Form::text('repay_pct',null, ['class' => 'form-control']) !!}
        <span class="input-group-addon">%</span>
    </div>
    
</div>

<!-- Repay Amount Field -->
<div class="form-group col-sm-4">
    {!! Form::label('repay_amount', '每期还款金额:') !!}
    {!! Form::text('repay_amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Order Limit Field -->
<div class="form-group col-sm-4">
    {!! Form::label('order_limit', '每订单限额:') !!}
    {!! Form::text('order_limit', null, ['class' => 'form-control']) !!}
</div>



<!-- Trade Time Start Field -->
    <div class="form-group col-sm-4">
        <div class="bootstrap-timepicker">
          {!! Form::label('trade_time_start', '有效交易时间始:') !!}
          <div class="input-group">
            {!! Form::text('trade_time_start',null, ['class' => 'form-control timepicker']) !!}
            <div class="input-group-addon">
              <i class="fa fa-clock-o"></i>
            </div>
          </div>
        </div>
    </div>
    

<!-- Trade Time End Field -->
<div class="form-group col-sm-4">
    <div class="bootstrap-timepicker">
      {!! Form::label('trade_time_end', '有效交易时间终:') !!}
      <div class="input-group">
        {!! Form::text('trade_time_end',null, ['class' => 'form-control timepicker']) !!}
        <div class="input-group-addon">
          <i class="fa fa-clock-o"></i>
        </div>
      </div>
    </div>
</div>

<!-- Blocked On Creation Field -->
<div class="form-group col-sm-4">
    {!! Form::label('blocked_on_creation', '是否冻结首期款:') !!}<br>
    <label class="radio-inline">
        {!! Form::radio('blocked_on_creation','1', null) !!} 是
    </label>
    <label class="radio-inline">
        {!! Form::radio('blocked_on_creation','0', null) !!} 否
    </label><br><br>
</div>

<div class="form-group col-sm-4">
  {!!Form::label('supporting_ids', '所需审核材料：')!!} 
  @if(isset($action)&&$action=='edit')
   {!!Form::select('supporting_ids[]',$supportings,$supportings_selected_ids,["class"=>"form-control select2","multiple"=>"multiple","data-placeholder"=>"选择所需审核材料","style"=>"width: 100%;"])!!}
  @else
      {!!Form::select('supporting_ids[]',$supportings,null,["class"=>"form-control select2","multiple"=>"multiple","data-placeholder"=>"选择所需审核材料","style"=>"width: 100%;"])!!}

  @endif
    
</div>
<!-- Refund Available Field -->
<div class="form-group col-sm-4">
    {!! Form::label('refund_available', '是否可退货:') !!}<br>
    <label class="radio-inline">
        {!! Form::radio('refund_available', '1', null) !!} 是
    </label>
    <label class="radio-inline">
        {!! Form::radio('refund_available','0', null) !!} 否
    </label><br><br>
</div>
<!-- Activated Field -->
<div class="form-group col-sm-4">
    {!! Form::label('activated', '是否有效:') !!}<br>
    <label class="radio-inline">
        {!! Form::radio('activated', '1', null) !!} 是
    </label>
    <label class="radio-inline">
        {!! Form::radio('activated', '0', null) !!} 否
    </label><br><br>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('goodsMasters.index') !!}" class="btn btn-default">取消</a>
</div>
