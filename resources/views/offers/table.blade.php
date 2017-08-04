<table class="table table-responsive" id="offers-table">
    <thead>
        <th>Identificador</th>
        <th>Compañía</th>
        <th>N. acciones</th>
        <th>Precio acción</th>
        <th>Antigüedad</th>
        <th colspan="3" class="hidden-print">Gestionar</th>
    </thead>
    <tbody>
    @foreach($offers as $offer)
        <tr>
            <td><a href="{{ route('offers.show', $offer)}}">#{!! $offer->id !!}</a></td>
            <td><a href="{{ route('vehicles.show', $offer->vehicle )}}">{{ $offer->vehicle->company }}</a></td>
            <td>{!! $offer->amount !!}</td>
            <td>@stock($offer->stock_price)</td>
            <td>{!! $offer->updated_at->diffForHumans() !!}</td>
            <td class="hidden-print">
                {!! Form::open(['route' => ['offers.destroy', $offer->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    @can('update', $offer)
                        <a href="{!! route('offers.edit', [$offer->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i> Editar</a>
                    @endcan
                    @can('delete', $offer)
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Estás seguro de querer borrarlo?')"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
