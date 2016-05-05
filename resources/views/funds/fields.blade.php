<!-- Fund Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fund_code', '资金方编号:') !!}
    {!! Form::text('fund_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Fund Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fund_name', '资金方名称:') !!}
    {!! Form::text('fund_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Currency Field -->
<div class="form-group col-sm-6">
    {!! Form::label('currency', '币种:') !!}
    {!! Form::text('currency', null, ['class' => 'form-control']) !!}
</div>

<!-- Credit Limit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('credit_limit', '授信额度(分):') !!}
    {!! Form::number('credit_limit', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Info Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_info', '联系方式:') !!}
    {!! Form::text('contact_info', null, ['class' => 'form-control']) !!}
</div>

<!-- Activated Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activated', '有效:') !!}
    {!! Form::select('activated',['1'=>'是','0'=>'否'],null,['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('funds.index') !!}" class="btn btn-default">Cancel</a>
</div>
