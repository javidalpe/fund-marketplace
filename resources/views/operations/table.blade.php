<table class="table table-responsive" id="operations-table">
    <thead>
        <th>Nombre de la compañía</th>
        <th>Inversor</th>
        <th>Tipo</th>
        <th>N. acciones</th>
        <th>Precio acción</th>
        <th>Fecha de la operación</th>
        <th colspan="3">Gestionar</th>
    </thead>
    <tbody>
    @foreach($operations as $operation)
        <tr>
            <td><a href="{{route('vehicles.show', $operation->vehicle)}}">{!! $operation->vehicle->name !!}</a></td>
            <td><a href="{{route('users.show', $operation->user)}}">{!! $operation->user->name !!}</a></td>
            <td>{!! $operation->type !!}</td>
            <td>{!! $operation->amount !!}</td>
            <td>@stock($operation->stock_price)</td>
            <td>{!! $operation->completed_at->format('d M. Y') !!}</td>
            <td>
                {!! Form::open(['route' => ['operations.destroy', $operation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    @can('update', $operation)
                        <a href="{!! route('operations.edit', [$operation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i> Editar</a>
                    @endcan
                    @can('delete', $operation)
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Estás seguro de querer borrarlo?')"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
