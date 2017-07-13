<table class="table table-responsive" id="users-table">
    <thead>
        <th>Nombre</th>
        <th>Email</th>
        @can('update', $fund)
            <th colspan="3">Gestionar</th>
        @endcan
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->name !!}</td>
            <td>{!! $user->email !!}</td>
            @can('update', $fund)
                <td>
                    {!! Form::open(['route' => ['funds.users.destroy', $fund->id, $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            @endcan
        </tr>
    @endforeach
    </tbody>
</table>
