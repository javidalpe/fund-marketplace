<table class="table table-responsive" id="bids-table">
    <thead>
        <th>Identificador</th>
        <th>Oferta</th>
        <th>N. acciones</th>
        <th>Precio acción</th>
        <th colspan="3">Gestionar</th>
    </thead>
    <tbody>
    @foreach($bids as $bid)
        <tr>
            <td><a href="{{ route('bids.show', $bid) }}">#{!! $bid->id !!}</a></td>
            <td><a href="{{ route('offers.show', $bid->offer) }}">#{!! $bid->offer->id !!}</a></td>
            <td>{!! $bid->amount !!}</td>
            <td>@stock($bid->stock_price)</td>
            <td>
                {!! Form::open(['route' => ['bids.destroy', $bid->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    @can('update', $bid)
                        <a href="{!! route('bids.edit', [$bid->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i> Editar</a>
                    @endcan
                    @can('delete', $bid)
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
