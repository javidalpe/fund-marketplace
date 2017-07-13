<table class="table table-responsive" id="users-table">
    <thead>
        <th>Nombre</th>
        <th>Email</th>
        <th colspan="3">Gestionar</th>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td><a href="{!! route('users.show', [$user->id]) !!}">{!! $user->name !!}</a></td>
            <td>{!! $user->email !!}</td>
            <td>
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i> Editar</a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
