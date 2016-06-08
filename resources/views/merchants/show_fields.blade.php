
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

<div class="form-group col-sm-6">
    {!! Form::label('filing_name', '备案名称:') !!}
    <p>{!! $merchants->filing_name !!}</p>
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
    @if(isset(json_decode($merchants->merchant_cert, true)['certfiles']))
        @foreach(json_decode($merchants->merchant_cert, true)['certfiles'] as $certfile)
            <div class='row'>
            <image src="http://{{env('OSS_IMGHOST').'/'.$certfile['filepath'].'@!thumbnail'}}"/>
            <a target="_blank" href="http://{{env('OSS_HOST').'/'.$certfile['filepath']}}">{{ $certfile['certname'] }}</a>
            
            <!--
                Code:
            {{urlencode(base64_encode(hash_hmac('sha1','GET\n\n\n'.$expires.'\n/'.$certfile['filepath'],env('OSS_KEY'),true)))}}
            -->
            
            </div>
        @endforeach
    @endif
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

