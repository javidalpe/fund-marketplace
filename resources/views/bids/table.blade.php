<table class="table table-responsive" id="bids-table">
    <thead>
        <th>Amount</th>
        <th>Precio de la acción</th>
        <th colspan="3">Accciones</th>
    </thead>
    <tbody>
    @foreach($bids as $bid)
        <tr>
            <td>{!! $bid->amount !!}</td>
            <td>@money($bid->stock_price)</td>
            <td>
                {!! Form::open(['route' => ['bids.destroy', $bid->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('bids.show', [$bid->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @can('update', $bid)
                        <a href="{!! route('bids.edit', [$bid->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    @endcan
                    @can('delete', $bid)
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
