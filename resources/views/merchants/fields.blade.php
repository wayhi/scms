<!-- Merchant Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('merchant_name', '平台名称:') !!}
    {!! Form::text('merchant_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Short Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('short_name', '简称:') !!}
    {!! Form::text('short_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Merchant Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('merchant_code', '平台编码:') !!}
    {!! Form::text('merchant_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', '联系地址:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Person Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_person', '联系人:') !!}
    {!! Form::text('contact_person', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', '联系电话:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Merchant Cert Field -->
<div class="form-group col-sm-6">
    {!! Form::label('merchant_cert', '相关资质文件:') !!}
    {!! Form::text('merchant_cert', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('merchants.index') !!}" class="btn btn-default">取消</a>
</div>
