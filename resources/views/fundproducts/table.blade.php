<table class="table table-responsive" id="fundproducts-table">
    <thead>
        <thead>
        <th>资金方名称</th>
        <th>产品名称</th>
        <th>还款方式</th>
        <th>还款期数</th>
        <th>每期还款比率</th>
        <th colspan="3">操作</th>
    </thead>
        
    <tbody>
    @foreach($fundproducts as $fundproduct)
        <tr>
            <td>{!! $fundproduct->fund->fund_name !!}</td>
            <td>{!! $fundproduct->product_name !!}</td>
            <td>{!! $fundproduct->repay_method_text !!}</td>
            <td>{!! $fundproduct->repay_times !!}</td>
            <td>{!! $fundproduct->repay_pct !!}%</td>
            <td>
                {!! Form::open(['route' => ['fundproducts.destroy', $fundproduct->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('fundproducts.show', [$fundproduct->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('fundproducts.edit', [$fundproduct->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确认删除吗?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>