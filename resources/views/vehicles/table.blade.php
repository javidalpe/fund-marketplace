<table class="table table-responsive" id="vehicles-table">
    <thead>
        <th>Nombre</th>
        <th>Nombre de la compañía</th>
        <th>Sitio web</th>
        <th colspan="3" class="hidden-print">Gestionar</th>
    </thead>
    <tbody>
    @foreach($vehicles as $vehicle)
        <tr>
            <td><a href="{{route('vehicles.show', $vehicle)}}">{!! $vehicle->name !!}</a></td>
            <td>{!! $vehicle->company !!}</td>
            <td><a href="{!! $vehicle->website !!}" target="_blank">{!! $vehicle->website !!}</a></td>
            <td class="hidden-print">
                {!! Form::open(['route' => ['vehicles.destroy', $vehicle->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    @can('update', $vehicle)
                        <a href="{!! route('vehicles.edit', [$vehicle->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i> Editar</a>
                    @endcan
                    @can('delete', $vehicle)
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Estás seguro de querer borrarlo?')"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
