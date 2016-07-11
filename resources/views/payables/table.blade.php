<table class="table table-responsive" id="payables-table">
    <thead>
        <th>订单号</th>
        <th>付款对象</th>
        <th>计划支付金额</th>
        <th>实际支付金额</th>
        <th>期数/总期数</th>
        <th>计划支付日期</th>
        <th>实际支付日期</th>
        <th>状态</th>
        <th colspan="3">操作</th>
    </thead>
    <tbody>
    @foreach($payables as $payable)
        <tr>
            <td>{!! $payable->order->order_number !!}</td>
            @if($payable->type==1)
             <td>{!! $payable->shop->account_name !!}</td>
            @elseif($payable->type==2)
            <td>{!! $payable->fundproduct->clearing_acct_name !!}</td>
            @endif
            <td>{!! $payable->amount_scheduled !!}</td>
            <td>{!! $payable->amount_actual !!}</td>
            @if($payable->type==2)
            <td>{!! $payable->serial_no !!}/{!!$payable->fundproduct->repay_times!!}</td>
            @else
            <td>N/A</td>
            @endif
            
            <td>{!! $payable->pd_scheduled !!}</td>
            <td>{!! $payable->pd_actual !!}</td>
            <td>{!! $payable->status_text !!}</td>
            <td>
                {!! Form::open(['route' => ['payables.destroy', $payable->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('payables.show', [$payable->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('payables.edit', [$payable->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确定删除吗?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>