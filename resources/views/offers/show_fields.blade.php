<dl class="dl-horizontal">

<!-- Id Field -->
<dt>{!! Form::label('id', 'Identificador:') !!}</dt><dd>#{!! $offer->id !!}</dd>

<!-- Vehicle Id Field -->
<dt>{!! Form::label('vehicle_id', 'Compañía:') !!}</dt><dd><a href="{{ route('vehicles.show', $offer->vehicle )}}">{!! $offer->vehicle->company !!}</a></dd>


<!-- N. acciones Field -->
<dt>{!! Form::label('amount', 'N. acciones:') !!}</dt><dd>{!! $offer->amount !!}</dd>

<!-- Precio acción Field -->
<dt>{!! Form::label('stock_price', 'Precio acción:') !!}</dt><dd>@stock($offer->stock_price)</dd>

<!-- Status Field -->
<dt>{!! Form::label('status', 'Status:') !!}</dt><dd>@include('offers.status')</dd>

<!-- Updated At Field -->
<dt>{!! Form::label('updated_at', 'Última actualización:') !!}</dt><dd>{!! $offer->updated_at->diffForHumans() !!}</dd>

<!-- Sell Fee Field -->
<dt>{!! Form::label('sell_fee', 'Comisión por venta:') !!}</dt><dd>@fee($offer->sell_fee)</dd>

@if (Auth::user()->isManager() || Auth::user()->id ==$offer->user_id )
    <!-- User Id Field -->
    <dt>{!! Form::label('user_id', 'Inversor (oculto):') !!}</dt><dd><a href="{{route('users.show', $offer->user)}}"></a> {!! $offer->user->name !!}</dd>
@endif

<!-- Created At Field -->
<dt>{!! Form::label('created_at', 'Fecha de creación:') !!}</dt><dd>{!! $offer->created_at->diffForHumans() !!}</dd>
</dl>
