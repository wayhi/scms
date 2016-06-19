<!-- Order Number Field -->
{!! Form::hidden('upload_type','')!!}
    
@if($mode==='editing' && isset($order))
    <div class="form-group col-sm-4">
    {!! Form::label('order_number', '订单号:') !!}
    <p>{{ $order->order_number }}</p>
    </div>
@endif
    
<!-- Goods Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('goods_id', '易分期产品:') !!}
    @if($mode==='editing' && isset($order))
        <p>{!! $order->goods->name_with_link !!}</p>
    @else
        {!! Form::select('goods_id',$goodslist,null, ['class' => 'form-control select2','placeholder'=>"选择产品..."]) !!}
    @endif    
</div>

<!-- Agent Field -->
<div class="form-group col-sm-4">
    {!! Form::label('agent', '代理:') !!}
    @if($mode==='editing' && isset($order))
        <p>{!! $order->agent !!}</p> &nbsp 
    @else
        {!! Form::text('agent', null, ['class' => 'form-control']) !!}
    @endif    
</div>

<!-- Shop Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('shop_id', '关联商家:') !!}
    @if($mode==='editing' && isset($order))
        
        {!! Form::select('shop_id',$order->goods->merchant->shops->lists('shop_name','id'),null, ['class' => 'form-control']) !!}
    @else    
        {!! Form::select('shop_id',[''=>''],null, ['class' => 'form-control']) !!}
    @endif
</div>

<!-- Customer Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('customer_id', '申请人:') !!}
    @if($mode==='editing' && isset($order))
        <p>{!! $order->customer->name_with_link !!}</p>
    @else
        
        {!! Form::select('customer_id',[''=>''],'', ['class' => 'customer-select2 form-control select2']) !!}
        
        
    @endif    
</div>

<!-- Bankcard Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('bankcard_id', '关联银行卡:') !!}
    @if($mode==='editing' && isset($order))
        <p>@if(isset($order->bankcard)){!! $order->bankcard->getCodeDisplay!!}@endif</p>
        &nbsp
    @else
        {!! Form::select('bankcard_id', [],null, ['class' => 'form-control bankcard']) !!}
    
    @endif    
</div>


<!-- Currency Field -->
<div class="form-group col-sm-4">
    {!! Form::label('currency', '币种:') !!}
    @if($mode==='editing' && isset($order))
        <p>{!! $order->currency !!}</p>
    @else
        {!! Form::select('currency',['CNY'=>'CNY','USD'=>'USD','HKD'=>'HKD','GBP'=>'GBP','JPY'=>'JPY','SGD'=>'SGD'], null, ['class' => 'form-control']) !!}
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

    
    @if($mode==='editing' && isset($order))
       
        <div class="form-group col-sm-4">
         {!! Form::label('process_status', '申请状态:') !!}
        <p>{!! $order->process_status_text !!}</p>&nbsp
        </div>

    @endif    

<!-- Fund Status Field -->

    @if($mode==='editing' && isset($order))
        <div class="form-group col-sm-4">
        {!! Form::label('fund_status', '资金状态:') !!}
        {!! Form::select('fund_status',[0=>'未申请',1=>'等待平台审核',2=>'等待资方审核',3=>'等待资方放款',4=>'等待平台放款',5=>'正常还款中',6=>'还款逾期',7=>'坏账处理',8=>'还款完成',9=>'拒绝放款',10=>'退款中'],null,['class'=>'form-control'])!!}
        </div>
      
    @endif    


<!-- Risk Level Field -->
<div class="form-group col-sm-4">
    {!! Form::label('risk_level', '风险等级:') !!}
    {!! Form::select('risk_level', [1,2,3,4,5],null, ['class' => 'form-control']) !!}
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

<!-- Goods Info Field>
<div class="form-group col-sm-4">
    {!! Form::label('goods_info', '产品信息:') !!}
    {!! Form::text('goods_info', null, ['class' => 'form-control']) !!}
</div-->

<!-- Supporting Doc Field -->
<div class="form-group col-sm-4">
    {!! Form::label('supporting_doctype', '支持文件:') !!}
    @if(isset($order)){!! Form::select('supporting_doctype',$order->goods->supportings->lists('title','title'),null, ['class' => 'form-control']) !!}
    @else
    {!! Form::select('supporting_doctype',[],null, ['class' => 'form-control']) !!}
    @endif
    
</div>

<div class="form-group col-sm-6">
    
   {!! Form::hidden('supporting_docs','{}', ['class' => 'form-control']) !!}
    {!! Form::label('docs_done', '已上传支持文件:') !!}
    <br>
    @if(isset($order) && isset(json_decode($order->supporting_docs, true)['certfiles']))
    <table>

    @foreach(json_decode($order->supporting_docs, true)['certfiles'] as $certfile)
        <tr>
        <td><a target="_blank" href="http://{{env('OSS_HOST').'/'.$certfile['filepath']}}">{{ $certfile['certname'] }}</a></td>
        <td><a class='btn btn-danger btn-xs' onclick="javascript:delete_uploaded_file(0)">删除</a></td>
        </tr>
    @endforeach
    </table>
    @endif
</div>

<div class="form-group col-sm-4">
<br>
    <div id="container">
        <a id="selectfiles" href="javascript:void(0);" class='btn'>选择文件</a>
        <a id="postfiles" href="javascript:void(0);" class='btn btn-xs btn-primary' name='supporting'>开始上传</a>
    </div>
    
    <div id="ossfile">你的浏览器不支持flash,Silverlight或者HTML5！</div>
   <pre class='hidden' id="console"></pre>
</div>






<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary','name'=>'action']) !!}
    @if(isset($order) && $order->process_status==1)
    {!! Form::submit('平台审核通过', ['class' => 'btn btn-success','name'=>'action']) !!}
    {!! Form::submit('拒绝', ['class' => 'btn btn-danger','name'=>'action']) !!}
    @endif
    @if(isset($order) && $order->process_status==2)
    {!! Form::submit('已放款', ['class' => 'btn btn-success','name'=>'action']) !!}
    @endif
    @if(isset($order) && $order->process_status==4)
    {!! Form::submit('还款完成', ['class' => 'btn btn-success','name'=>'action']) !!}
    
    @endif
    @if(isset($order) && $order->process_status<=4 && $order->process_status>0)
    {!! Form::submit('订单取消', ['class' => 'btn btn-warning','name'=>'action']) !!}
    @endif
    <a href="{!! route('orders.index') !!}" class="btn btn-default">返回</a>
</div>
