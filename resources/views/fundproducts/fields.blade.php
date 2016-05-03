<div class="form-group col-sm-4">
    {!! Form::label('product_code', '产品编号：') !!}
    {!! Form::text('product_code', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::label('product_name', '产品名称：') !!}
    {!! Form::text('product_name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::label('credit_limit', '产品限额(分)：') !!}
    {!! Form::number('crredit_limit', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::label('limit_per_order', '每单限额(分)：') !!}
    {!! Form::number('limit_per_order', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::label('repay_method', '还款方式：') !!}
    {!! Form::text('repay_method', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::label('repay_times', '还款期数：') !!}
    {!! Form::number('repay_times', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::label('repay_pct', '每期还款百分比：') !!}
    <div class="input-group">
        <input type="text" class="form-control">
        <span class="input-group-addon">%</span>
    </div>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('clearing_acct_name', '账户名称：') !!}
    {!! Form::text('clearing_acct_name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::label('clearing_acct_bank', '开户银行：') !!}
    {!! Form::text('clearing_acct_bank', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::label('clearing_acct_code', '银行账号：') !!}
    {!! Form::text('clearing_acct_code', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::label('controller_name', '管理员组别：') !!}
    {!! Form::text('controller_name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::label('contact_email', '联系人Email：') !!}
    {!! Form::email('contact_email', null, ['class' => 'form-control']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('fundproducts.index') !!}" class="btn btn-default">Cancel</a>
</div>
