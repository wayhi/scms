<div class="form-group col-sm-4">
    {!! Form::label('fund_name', '所属资金方:') !!}
    <p>{!! $fundproduct->fund->fund_name !!}</p>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('product_code', '产品编号:') !!}
    <p>{!! $fundproduct->product_code !!}</p>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('product_name', '产品名称:') !!}
    <p>{!! $fundproduct->product_name !!}</p>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('credit_limit', '授信额度:') !!}
    <p>{!! $fundproduct->credit_limit_formatted !!}</p>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('limit_per_order', '每订单额度:') !!}
    <p>{!! $fundproduct->limit_per_order_formatted !!}</p>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('repay_method', '还款方式:') !!}
    <p>{!! $fundproduct->repay_method_text !!}</p>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('repay_times', '还款次数:') !!}
    <p>{!! $fundproduct->repay_times !!}</p>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('repay_period', '还款间隔:') !!}
    <p>{!! $fundproduct->repay_period_text !!}</p>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('repay_pct', '每期还款比率:') !!}
    <p>{!! $fundproduct->repay_pct !!}%</p>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('interest_rate', '每期利率:') !!}
    <p>{!! $fundproduct->interest_rate !!}%</p>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('clearing_acct_name', '账户名称：') !!}
    <p>{!! $fundproduct->clearing_acct_name !!}</p>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('clearing_acct_bank', '开户银行：') !!}
    <p>{!! $fundproduct->clearing_acct_bank !!}</p>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('clearing_acct_code', '银行账号：') !!}
    <p>{!! $fundproduct->clearing_acct_code !!}</p>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('controller_name', '管理员组别：') !!}
    <p>{!! $fundproduct->controller_name !!}</p>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('contact_email', '联系人Email：') !!}
    <p>{!! $fundproduct->contact_email !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-4">
    {!! Form::label('created_at', '创建时间：') !!}
    <p>{!! $fundproduct->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-4">
    {!! Form::label('updated_at', '更新时间：') !!}
    <p>{!! $fundproduct->updated_at !!}</p>
</div>

