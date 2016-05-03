<!-- Fund Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fund_code', '资金方编号:') !!}
    <p>{!! $funds->fund_code !!}</p>
</div>

<!-- Fund Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fund_name', '资金方名称:') !!}
    <p>{!! $funds->fund_name !!}</p>
</div>

<!-- Credit Limit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('credit_limit', '授信额度:') !!}
    <p>{!! $funds->credit_limit !!}</p>
</div>

<!-- Currency Field -->
<div class="form-group col-sm-6">
    {!! Form::label('currency', '币种:') !!}
    <p>{!! $funds->currency !!}</p>
</div>

<!-- Contact Info Field -->
<div class="form-group  col-sm-6">
    {!! Form::label('contact_info', '联系方式:') !!}
    <p>{!! $funds->contact_info !!}</p>
</div>

<!-- Activated Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activated', '有效:') !!}
    <p>{!! $funds->activated !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', '创建时间:') !!}
    <p>{!! $funds->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', '更新时间:') !!}
    <p>{!! $funds->updated_at !!}</p>
</div>

