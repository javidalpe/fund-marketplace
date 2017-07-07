<table class="table table-responsive" id="vehicles-table">
    <thead>
        <th>Name</th>
        <th>Company</th>
        <th>Website</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($vehicles as $vehicle)
        <tr>
            <td>{!! $vehicle->name !!}</td>
            <td>{!! $vehicle->company !!}</td>
            <td>{!! $vehicle->website !!}</td>
            <td>
                {!! Form::open(['route' => ['vehicles.destroy', $vehicle->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('vehicles.show', [$vehicle->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @can('edit', App\Models\Vehicle::class)
                        <a href="{!! route('vehicles.edit', [$vehicle->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    @endcan
                    @can('edit', App\Models\Vehicle::class)
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
