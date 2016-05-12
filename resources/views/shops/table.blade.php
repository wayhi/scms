<table class="table table-responsive" id="shops-table">
    <thead>
        <th>所属商户</th>
        <th>商家编号</th>
        <th>商家名称</th>
        <th>联系人</th>
        <th>手机</th>
        <th>状态</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($shops as $shops)
        <tr>
            <td>{!! $shops->merchant->merchant_name !!}</td>
            <td>{!! $shops->shop_code !!}</td>
            <td>{!! $shops->shop_name !!}</td>
            <td>{!! $shops->contact_name !!}</td>
            <td>{!! $shops->mobile_phone !!}</td>
            <td>{!! $shops->status_text !!}</td>
            <td>
                {!! Form::open(['route' => ['shops.destroy', $shops->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('shops.show', [$shops->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('shops.edit', [$shops->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确认删除吗?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>