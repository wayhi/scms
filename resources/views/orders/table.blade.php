<table class="table table-responsive" id="orders-table">
    <thead>
        <th>订单号</th>
        <th>贷款申请人</th>
        <th>申请产品</th>
        <th>类型</th>
        <th>申请金额</th>
        <th>订单状态</th>
        <th>资金状态</th>
        <th>创建日期</th>
        <th>生效日期</th>
        <th colspan="3">操作</th>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{!! $order->order_number !!}</td>
            <td>{!! $order->customer->name !!}</td>
            <td>{!! $order->goods->goods_name !!}</td>
            <td>{!! $order->goods->type_text !!}</td>
            <td>{!! $order->apply_amount !!}</td>
            <td>{!! $order->process_status_text !!}</td>
            <td>{!! $order->fund_status_text !!}</td>
            <td>{!! $order->created_at !!}</td>
            <td>{!! $order->effective_date !!}</td>
            <td>
                {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('orders.show', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('orders.edit', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确认删除吗?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>