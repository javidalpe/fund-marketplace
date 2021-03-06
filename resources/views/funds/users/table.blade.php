<table class="table table-responsive" id="users-table">
    <thead>
        <th>Nombre</th>
        <th>Email</th>
        @can('update', $fund)
            <th colspan="3" class="hidden-print">Gestionar</th>
        @endcan
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->name !!}</td>
            <td>{!! $user->email !!}</td>
            @can('update', $fund)
                <td class="hidden-print">
                    {!! Form::open(['route' => ['funds.users.destroy', $fund->id, $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Estás seguro de querer borrarlo?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            @endcan
        </tr>
    @endforeach
    </tbody>
</table>
