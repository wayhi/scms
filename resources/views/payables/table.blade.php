<table class="table table-responsive" id="payables-table">
    <thead>
        <th>订单号</th>
        <th>付款对象</th>
        <th>关联商户</th>
        <th>关联资金</th>
        <th>计划支付金额</th>
        <th>实际支付金额</th>
        <th>序号</th>
        <th>计划支付日期</th>
        <th>实际支付日期</th>
        <th>状态</th>
        <th colspan="3">操作</th>
    </thead>
    <tbody>
    @foreach($payables as $payable)
        <tr>
            <td><a href='/orders/{{$payable->order_id}}' target='_blank'>{!! $payable->order->order_number !!}</a></td>
            <td>{!! $payable->type_text !!}</td>
            <td>{!! $payable->shop->shop_name !!}</td>
            <td>{!! $payable->fundproduct->product_name !!}</td>
            <td>{!! $payable->amount_scheduled !!}</td>
            <td>{!! $payable->amount_actual !!}</td>
            <td>{!! $payable->serial_no !!}</td>
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