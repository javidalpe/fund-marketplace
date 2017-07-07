<table class="table table-responsive" id="operations-table">
    <thead>
        <th>Type</th>
        <th>Amount</th>
        <th>Stock Price</th>
        <th>Completed At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($operations as $operation)
        <tr>
            <td>{!! $operation->type !!}</td>
            <td>{!! $operation->amount !!}</td>
            <td>@money($operation->stock_price)</td>
            <td>{!! $operation->completed_at !!}</td>
            <td>
                {!! Form::open(['route' => ['operations.destroy', $operation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('operations.show', [$operation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @can('edit', App\Models\Operation::class)
                        <a href="{!! route('operations.edit', [$operation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    @endcan
                    @can('edit', App\Models\Operation::class)
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
