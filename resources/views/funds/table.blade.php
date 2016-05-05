<table class="table table-responsive" id="funds-table">
    <thead>
        <th>资金方编号</th>
        <th>资金方名称</th>
        <th>币种</th>
        <th>授信额度</th>
        <th>有效</th>
        <th colspan="3">操作</th>
    </thead>
    <tbody>
    @foreach($funds as $funds)
        <tr>
            <td>{!! $funds->fund_code !!}</td>
            <td>{!! $funds->fund_name !!}</td>
            <td>{!! $funds->currency !!}</td>
            <td>{!! $funds->credit_limit_formatted !!}</td>
            <td>{!! $funds->activated_text !!}</td>
            <td>
                {!! Form::open(['route' => ['funds.destroy', $funds->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('funds.show', [$funds->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('funds.edit', [$funds->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确认删除吗?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>