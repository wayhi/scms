
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
    <p><a target="_blank" href="{{route('shops.show',$receivable->shop_id)}}">{!! $receivable->shop->shop_name !!}</a></p>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('goods_id', '关联产品:') !!}
    <p><a href="{{route('goodsMasters.show',$receivable->goods_id)}}" target="_blank">{!! $receivable->goods->goods_name !!}</a></p>
</div>
<!-- Amount Scheduled Field -->
<div class="form-group col-sm-4">
    {!! Form::label('amount_scheduled', '计划收取金额:') !!}
    <p>{!! $receivable->amount_scheduled !!}</p>
</div>

<!-- Amount Actual Field -->
<div class="form-group col-sm-4">
    {!! Form::label('amount_actual', '实际收取金额:') !!}
    <p>{!! $receivable->amount_actual !!}</p>
</div>

<!-- Adjustment Amount Field -->
<div class="form-group col-sm-4">
    {!! Form::label('adjustment_amount', '   调整金额:') !!}
    <p>{!! $receivable->adjustment_amount !!}</p>
</div>

<!-- Serial No Field -->
<div class="form-group col-sm-4">
    {!! Form::label('serial_no', '期数/总期数:') !!}
    <p>{!! $receivable->serial_no !!}/{!!$receivable->order->goods->repay_times!!}</p>
</div>

<!-- Pd Scheduled Field -->
<div class="form-group col-sm-4">
    {!! Form::label('pd_scheduled', '计划还款时间:') !!}
    <p>{!! $receivable->pd_scheduled !!}</p>
</div>

<!-- Pd Actual Field -->
<div class="form-group col-sm-4">
    {!! Form::label('pd_actual', '实际还款时间:') !!}
    <p>{!! $receivable->pd_actual !!}</p>
</div>

<!-- Handled By Field -->
<div class="form-group col-sm-4">
    {!! Form::label('handled_by', '处理人:') !!}
    <p>{!! $receivable->handled_by !!}</p>
</div>


<!-- Memo Field -->
<div class="form-group col-sm-4">
    {!! Form::label('memo', '备注:') !!}
    <p>{!! $receivable->memo !!}&nbsp</p>
</div>

<!-- Status Field -->
<div class="form-group col-sm-4">
    {!! Form::label('status', '状态:') !!}
    <p>{!! $receivable->status_text !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-4">
    {!! Form::label('created_at', '创建时间:') !!}
    <p>{!! $receivable->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-4">
    {!! Form::label('updated_at', '更新时间:') !!}
    <p>{!! $receivable->updated_at !!}</p>
</div>

