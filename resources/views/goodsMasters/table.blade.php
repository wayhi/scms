<table class="table table-responsive" id="goodsMasters-table">
    <thead>
        <th>类型</th>
        <th>产品名称</th>
        <th>商户</th>
        <th>资金产品</th>
        <th>有效</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($goodsMasters as $goodsMaster)
        <tr>
            <td>{!! $goodsMaster->type_text !!}</td>
            <td>{!! $goodsMaster->goods_name !!}</td>
            <td>{!! $goodsMaster->merchant->merchant_name !!}</td>
             <td>{!!$goodsMaster->fundproduct->product_name !!}</td>
            <td>{!! $goodsMaster->activated_text !!}</td>
            <td>
                {!! Form::open(['route' => ['goodsMasters.destroy', $goodsMaster->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('goodsMasters.show', [$goodsMaster->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('goodsMasters.edit', [$goodsMaster->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确定删除吗?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>