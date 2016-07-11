<table class="table table-responsive" id="receivables-table">
    <thead>
        <th>订单号</th>
        <th>易分期产品</th>
        <th>计划收取金额</th>
        <th>实际收取金额</th>
        <th>期数/总期数</th>
        <th>计划收取日期</th>
        <th>实际收取日期</th>
        <th>状态</th>
        <th colspan="3">操作</th>
    </thead>
    <tbody>
    @foreach($receivables as $receivable)
        <tr>
            <td>{!! $receivable->order->order_number !!}</td>
            <td>{!! $receivable->goods->goods_name !!}</td>
            <td>{!! $receivable->amount_scheduled !!}</td>
            <td>{!! $receivable->amount_actual !!}</td>
            <td>{!! $receivable->serial_no !!}/@if($receivable->type==2){!! $receivable->goods->repay_times!!}@else 1 @endif</td>
            <td>{!! $receivable->pd_scheduled !!}</td>
            <td>{!! $receivable->pd_actual !!}</td>
            <td>{!! $receivable->status_text !!}</td>
            <td>
                {!! Form::open(['route' => ['receivables.destroy', $receivable->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('receivables.show', [$receivable->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('receivables.edit', [$receivable->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确认删除吗?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>