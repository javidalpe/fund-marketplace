<table class="table table-responsive" id="operations-table">
    <thead>
        <th>Nombre de la compañía</th>
        <th>Tipo</th>
        <th>N. acciones</th>
        <th>Precio acción</th>
        <th>Fecha de la operación</th>
        <th colspan="3">Accciones</th>
    </thead>
    <tbody>
    @foreach($operations as $operation)
        <tr>
            <td>{!! $operation->vehicle->company !!}</td>
            <td>{!! $operation->type !!}</td>
            <td>{!! $operation->amount !!}</td>
            <td>@money($operation->stock_price)</td>
            <td>{!! $operation->completed_at->format('d M. Y') !!}</td>
            <td>
                {!! Form::open(['route' => ['operations.destroy', $operation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('operations.show', [$operation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @can('update', $operation)
                        <a href="{!! route('operations.edit', [$operation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    @endcan
                    @can('delete', $operation)
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
