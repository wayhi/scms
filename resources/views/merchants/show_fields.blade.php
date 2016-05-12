
<!-- Merchant Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('merchant_name', '平台名称:') !!}
    <p>{!! $merchants->merchant_name !!}</p>
</div>

<!-- Short Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('short_name', '简称:') !!}
    <p>{!! $merchants->short_name !!}</p>
</div>

<!-- Merchant Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('merchant_code', '平台编号:') !!}
    <p>{!! $merchants->merchant_code !!}</p>
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', '联系地址:') !!}
    <p>{!! $merchants->address !!}</p>
</div>

<!-- Contact Person Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_person', '联系人:') !!}
    <p>{!! $merchants->contact_person !!}</p>
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', '联系电话:') !!}
    <p>{!! $merchants->phone !!}</p>
</div>

<!-- Merchant Cert Field -->
<div class="form-group col-sm-6">
    {!! Form::label('merchant_cert', '相关资质文件:') !!}
    <p>{!! $merchants->merchant_cert !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', '创建时间:') !!}
    <p>{!! $merchants->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', '更新时间:') !!}
    <p>{!! $merchants->updated_at !!}</p>
</div>

