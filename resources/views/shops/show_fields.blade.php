<!-- Merchant Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('merchant_id', '所属商户:') !!}
    <p>{!! $shops->merchant->merchant_name !!}</p>
</div>

<!-- Shop Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_code', '商家编号:') !!}
    <p>{!! $shops->shop_code !!}</p>
</div>

<!-- Shop Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_name', '商家名称:') !!}
    <p>{!! $shops->shop_name !!}</p>
</div>

<!-- Shop Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_address', '商家地址:') !!}
    <p>{!! $shops->shop_address !!}</p>
</div>

<!-- Contact Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_name', '联系人:') !!}
    <p>{!! $shops->contact_name !!}</p>
</div>

<!-- Line Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('line_phone', '固定电话:') !!}
    <p>{!! $shops->line_phone !!}</p>
</div>

<!-- Mobile Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobile_phone', '移动电话:') !!}
    <p>{!! $shops->mobile_phone !!}</p>
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', '状态:') !!}
    <p>{!! $shops->status_text !!}</p>
</div>

<!-- Account Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_name', '银行开户名:') !!}
    <p>{!! $shops->account_name !!}</p>
</div>

<!-- Bank Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_name', '开户银行:') !!}
    <p>{!! $shops->bank_name !!}</p>
</div>

<!-- Account Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_code', '银行账号:') !!}
    <p>{!! $shops->account_code !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', '创建日期:') !!}
    <p>{!! $shops->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', '更新日期:') !!}
    <p>{!! $shops->updated_at !!}</p>
</div>

