<div class="form-group col-sm-4">
    {!! Form::label('fund_id', '所属资金方：') !!}
    {!! Form::select('fund_id',$fundlist,null,['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::label('product_code', '产品编号：') !!}
    {!! Form::text('product_code', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::label('product_name', '产品名称：') !!}
    {!! Form::text('product_name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::label('credit_limit', '授信额度(金额单位－分)：') !!}
    {!! Form::number('credit_limit', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::label('limit_per_order', '每单限额(金额单位－分)：') !!}
    {!! Form::number('limit_per_order', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::label('repay_method', '还款方式：') !!}
    {!! Form::select('repay_method',[0=>'等额本息',1=>'先息后本',2=>'平均利息'],null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::label('repay_times', '还款期数：') !!}
    {!! Form::number('repay_times',null,['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::label('repay_period', '还款间隔：') !!}
    {!! Form::select('repay_period',[0=>'每月',1=>'每30天',2=>'每3个月',3=>'每6个月'],null,['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-4">
    {!! Form::label('repay_pct', '每期还款比率：') !!}
    <div class="input-group">
        
        {!!Form::text('repay_pct',null,['class' => 'form-control']);!!}
        <span class="input-group-addon">%</span>
    </div>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('interest_rate', '每期利率：') !!}
    <div class="input-group">
        
        {!!Form::text('interest_rate',null,['class' => 'form-control']);!!}
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
