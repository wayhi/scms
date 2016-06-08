<!-- Type Field -->
<div class="form-group col-sm-3">
    {!! Form::label('type', '付款对象:') !!}
    <p>{!! $payable->fundproduct->product_name !!}</p>
    
</div>

<!-- Amount Scheduled Field -->
<div class="form-group col-sm-3">
    {!! Form::label('amount_scheduled', '计划付款金额:') !!}
    <p>{!! $payable->amount_scheduled !!}</p>
</div>

<!-- Serial No Field -->
<div class="form-group col-sm-3">
    {!! Form::label('serial_no', '期数:') !!}
    <p>{!! $payable->serial_no !!}</p>
</div>

<!-- Pd Scheduled Field -->
<div class="form-group col-sm-3">
    {!! Form::label('pd_scheduled', '计划付款日期:') !!}
    <p>{!! $payable->pd_scheduled !!}</p>
</div>

<!-- Amount Actual Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount_actual', '实际付款金额:') !!}
    {!! Form::text('amount_actual', null, ['class' => 'form-control']) !!}
</div>

<!-- Adjustment Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('adjustment_amount', '调整金额:') !!}
    {!! Form::text('adjustment_amount', null, ['class' => 'form-control']) !!}
</div>





<!-- Pd Actual Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pd_actual', '实际付款日期:') !!}
    {!! Form::text('pd_actual', null, ['class' => 'form-control']) !!}
</div>

<!-- Memo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('memo', '备注:') !!}
    {!! Form::text('memo', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('payables.index') !!}" class="btn btn-default">取消</a>
</div>
