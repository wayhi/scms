<!-- Merchant Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('merchant_id', '所属商户') !!}
    {!! Form::select('merchant_id', $merchants, null, ['class' => 'form-control']) !!}
</div>

<!-- Shop Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_code', '商家编号') !!}
    {!! Form::text('shop_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Shop Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_name', '商家名称：') !!}
    {!! Form::text('shop_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Shop Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_address', '商家地址：') !!}
    {!! Form::text('shop_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_name', '联系人：') !!}
    {!! Form::text('contact_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Line Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('line_phone', '固定电话:') !!}
    {!! Form::text('line_phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Mobile Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobile_phone', '移动电话:') !!}
    {!! Form::text('mobile_phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
<br>
    {!! Form::label('status', '状态:') !!}
    <label class="radio-inline">
        {!! Form::radio('status', 1, 1) !!} 有效
    </label>
    <label class="radio-inline">
        {!! Form::radio('status', 0, 0) !!} 无效
    </label><br><br>
</div>

<!-- Account Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_name', '银行开户名:') !!}
    {!! Form::text('account_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Bank Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_name', '银行名称:') !!}
    {!! Form::text('bank_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Account Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_code', '银行账号:') !!}
    {!! Form::text('account_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('shops.index') !!}" class="btn btn-default">取消</a>
</div>
