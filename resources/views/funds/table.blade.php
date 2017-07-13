<table class="table table-responsive" id="funds-table">
    <thead>
        <th>Nombre</th>
        <th>Sitio web</th>
        <th colspan="3">Gestionar</th>
    </thead>
    <tbody>
    @foreach($funds as $fund)
        <tr>
            <td><a href="{!! route('funds.show', [$fund->id]) !!}">{!! $fund->name !!}</a></td>
            <td><a href="{!! $fund->website !!}" target="_blank">{!! $fund->website !!}</a></td>
            <td>
                {!! Form::open(['route' => ['funds.destroy', $fund->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    @can('update', $fund)
                        <a href="{!! route('funds.edit', [$fund->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i> Editar</a>
                    @endcan
                    @can('delete', $fund)
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
