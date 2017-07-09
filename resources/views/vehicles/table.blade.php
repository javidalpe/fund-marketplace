<table class="table table-responsive" id="vehicles-table">
    <thead>
        <th>Nombre</th>
        <th>Nombre de la compañía</th>
        <th>Sitio web</th>
        <th colspan="3">Accciones</th>
    </thead>
    <tbody>
    @foreach($vehicles as $vehicle)
        <tr>
            <td>{!! $vehicle->name !!}</td>
            <td>{!! $vehicle->company !!}</td>
            <td><a href="{!! $vehicle->website !!}" target="_blank">{!! $vehicle->website !!}</a></td>
            <td>
                {!! Form::open(['route' => ['vehicles.destroy', $vehicle->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('vehicles.show', [$vehicle->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @can('update', $vehicle)
                        <a href="{!! route('vehicles.edit', [$vehicle->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    @endcan
                    @can('delete', $vehicle)
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
