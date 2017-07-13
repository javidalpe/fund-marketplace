<table class="table table-responsive" id="users-table">
    <thead>
        <th>Nombre</th>
        <th>Email</th>
        <th>Acciones</th>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td><a href="{{route('users.show', $user->user) }}">{!! $user->user->name !!}</a></td>
            <td>{!! $user->user->email !!}</td>
            <td>{!! $user['amount'] !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
