<table class="table table-responsive" id="examples-table">
    <thead>
        <th>Title</th>
        <th>Title</th>
        <th>Title</th>
        <th>Title</th>
        <th>Title</th>
        <th>Title</th>
        <th>Title</th>
        <th>Title</th>
        <th>Title</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($examples as $example)
        <tr>
            <td>{!! $example->title !!}</td>
            <td>{!! $example->title !!}</td>
            <td>{!! $example->title !!}</td>
            <td>{!! $example->title !!}</td>
            <td>{!! $example->title !!}</td>
            <td>{!! $example->title !!}</td>
            <td>{!! $example->title !!}</td>
            <td>{!! $example->title !!}</td>
            <td>{!! $example->title !!}</td>
            <td>
                {!! Form::open(['route' => ['examples.destroy', $example->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('examples.show', [$example->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('examples.edit', [$example->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i> Editar</a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>