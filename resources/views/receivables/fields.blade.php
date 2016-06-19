<!-- Order Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('order_id', '订单号:') !!}
    <p><a href='/orders/{{$receivable->order_id}}' target='_blank'>{!! $receivable->order->order_number !!}</a></p>
</div>

<!-- Type Field -->
<div class="form-group col-sm-4">
    {!! Form::label('type', '收款对象:') !!}
    @if($receivable->type==2)  <!-- 客户-->
    <p><a href="{{route('customers.show',$receivable->order->customer->id)}}" target="_blank" data-toggle="tooltip" title="☎️：{{$receivable->order->customer->mobile_phone}}"> {!! $receivable->order->customer->name !!}</a></p>
    @elseif($receivable->type==1) <!-- 资金方-->
    <p><a href="{{route('fundproducts.show',$receivable->fund_product_id)}}" target="_blank"> {!! $receivable->fundproduct->product_name !!}</a></p>
    @endif
</div>

<!-- Shop Id Field -->
<div class="form-group col-sm-4">
   {!! Form::label('shop_id', '关联商家:') !!}
    <p><a href="{{route('shops.show',$receivable->shop->id)}}" target="_blank">{!! $receivable->shop->shop_name !!}</a></p>
</div>

<!-- Fund Product Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('fund_product_id', '关联资金:') !!}
    <p><a href="{{route('fundproducts.show',$receivable->fundproduct->id)}}" target="_blank">{!! $receivable->fundproduct->product_name !!}</a></p>
</div>

<!-- Amount Scheduled Field -->
<div class="form-group col-sm-4">
    {!! Form::label('amount_scheduled', '计划应收款:') !!}
    <p>{!! $receivable->amount_scheduled !!}</p>
</div>

<!-- Serial No Field -->
<div class="form-group col-sm-4">
   {!! Form::label('serial_no', '期数/总期数:') !!}
    <p>{!! $receivable->serial_no !!}/{!!$receivable->order->goods->repay_times!!}</p>
</div>

<!-- Amount Actual Field -->
<div class="form-group col-sm-4">
    {!! Form::label('amount_actual', '实际收款:') !!}
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

<!-- Pd Scheduled Field -->
<div class="form-group col-sm-4">
    {!! Form::label('pd_scheduled', '计划收款日期:') !!}
    <p>{!! $receivable->pd_scheduled !!}</p><br>
</div>

<!-- Pd Actual Field -->
<div class="form-group col-sm-4">
    {!! Form::label('pd_actual', '实际收款日期:') !!}
    <div class="input-group date">
      <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
      </div>
      {!! Form::text('pd_actual', null, ['class' => 'form-control','id'=>'datepicker']) !!}
    </div>
</div>

<!-- Status Field -->
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
     <a href="{!! route('receivables.index') !!}" class="btn btn-success">信用卡扣款</a>
    <a href="{!! route('receivables.index') !!}" class="btn btn-default">返回</a>
</div>
