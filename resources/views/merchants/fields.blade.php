{!! Form::hidden('upload_type','')!!}
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
<!-- Merchant Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('filing_name', '备案名称:') !!}
    {!! Form::text('filing_name', null, ['class' => 'form-control']) !!}
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

<div class="form-group col-sm-6">
    {!! Form::label('merchant_cert_type', '相关资质文件:') !!}
    {!! Form::select('merchant_cert_type',['营业执照'=>'营业执照','税务登记证'=>'税务登记证','组织机构代码证'=>'组织机构代码证'],null, ['class' => 'form-control']) !!}
    <div id="container">
        <a id="selectfiles" href="javascript:void(0);" class='btn'>选择文件</a>
        <a id="postfiles" href="javascript:void(0);" class='btn btn-xs btn-primary' name='merchant'>开始上传</a>
    </div>
    
    <div id="ossfile">你的浏览器不支持flash,Silverlight或者HTML5！</div>
   <pre class='hidden' id="console"></pre>
    
</div>
 
<!-- Merchant Cert Field -->
<div class="form-group col-sm-6">
    
    {!! Form::hidden('merchant_cert', null, ['class' => 'form-control']) !!}
    {!! Form::label('cert_done', '已上传资质文件:') !!}
    <br>
    @if(isset($merchants) && isset(json_decode($merchants->merchant_cert, true)['certfiles']))
    <table>

    @foreach(json_decode($merchants->merchant_cert, true)['certfiles'] as $certfile)
        <tr>
        <td><a target="_blank" href="http://{{env('OSS_HOST').'/'.$certfile['filepath']}}">{{ $certfile['certname'] }}</a></td>
        <td><a class='btn btn-danger btn-xs' onclick="javascript:delete_uploaded_file(0)">删除</a></td>
        </tr>
    @endforeach
    </table>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存',['class' => 'btn btn-primary','name'=>'save']) !!}
    <a href="{!! route('merchants.index') !!}" class="btn btn-default">取消</a>
</div>
