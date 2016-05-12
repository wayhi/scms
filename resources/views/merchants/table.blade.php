<table class="table table-responsive" id="merchants-table">
    <thead>
        <th>编号</th>
        <th>商户平台名称</th>
        <th>联系人</th>
        <th>电话</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($merchants as $merchants)
        <tr>
            <td>{!! $merchants->merchant_code !!}</td>
            <td>{!! $merchants->merchant_name !!}</td>
            <td>{!! $merchants->contact_person !!}</td>
            <td>{!! $merchants->phone !!}</td>
            <td>
                {!! Form::open(['route' => ['merchants.destroy', $merchants->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('merchants.show', [$merchants->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('merchants.edit', [$merchants->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确定删除吗?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>