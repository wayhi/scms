<!-- Order Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_id', 'Order Id:') !!}
    {!! Form::text('order_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Shop Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_id', 'Shop Id:') !!}
    {!! Form::text('shop_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Fund Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fund_product_id', 'Fund Product Id:') !!}
    {!! Form::text('fund_product_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Scheduled Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount_scheduled', 'Amount Scheduled:') !!}
    {!! Form::text('amount_scheduled', null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Actual Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount_actual', 'Amount Actual:') !!}
    {!! Form::text('amount_actual', null, ['class' => 'form-control']) !!}
</div>

<!-- Adjustment Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('adjustment_amount', 'Adjustment Amount:') !!}
    {!! Form::text('adjustment_amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Serial No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('serial_no', 'Serial No:') !!}
    {!! Form::number('serial_no', null, ['class' => 'form-control']) !!}
</div>

<!-- Pd Scheduled Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pd_scheduled', 'Pd Scheduled:') !!}
    {!! Form::text('pd_scheduled', null, ['class' => 'form-control']) !!}
</div>

<!-- Pd Actual Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pd_actual', 'Pd Actual:') !!}
    {!! Form::text('pd_actual', null, ['class' => 'form-control']) !!}
</div>

<!-- Handled By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('handled_by', 'Handled By:') !!}
    {!! Form::text('handled_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Ip Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ip_address', 'Ip Address:') !!}
    {!! Form::text('ip_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Memo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('memo', 'Memo:') !!}
    {!! Form::text('memo', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('receivables.index') !!}" class="btn btn-default">Cancel</a>
</div>
