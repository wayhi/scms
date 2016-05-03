<table class="table table-responsive" id="fundProducts-table">
    <thead>
        
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($fundproducts as $fundproduct)
        <tr>
            
            <td>
                {!! Form::open(['route' => ['fundproducts.destroy', $fundproduct->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('fundproducts.show', [$fundproduct->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('fundproducts.edit', [$fundproduct->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>