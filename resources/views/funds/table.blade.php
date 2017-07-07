<table class="table table-responsive" id="funds-table">
    <thead>
        <th>Name</th>
        <th>Website</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($funds as $fund)
        <tr>
            <td>{!! $fund->name !!}</td>
            <td>{!! $fund->website !!}</td>
            <td>
                {!! Form::open(['route' => ['funds.destroy', $fund->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('funds.show', [$fund->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @can('update', $fund)
                        <a href="{!! route('funds.edit', [$fund->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
