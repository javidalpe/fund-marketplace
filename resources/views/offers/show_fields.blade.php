<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Identificador:') !!}
    <p>#{!! $offer->id !!}</p>
</div>

<!-- Vehicle Id Field -->
<div class="form-group">
    {!! Form::label('vehicle_id', 'Compañía:') !!}
    <p><a href="{{ route('vehicles.show', $offer->vehicle )}}">{!! $offer->vehicle->company !!}</a></p>
</div>


<!-- N. acciones Field -->
<div class="form-group">
    {!! Form::label('amount', 'N. acciones:') !!}
    <p>{!! $offer->amount !!}</p>
</div>

<!-- Precio acción Field -->
<div class="form-group">
    {!! Form::label('stock_price', 'Precio acción:') !!}
    <p>@stock($offer->stock_price)</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>@include('offers.status')</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Última actualización:') !!}
    <p>{!! $offer->updated_at->diffForHumans() !!}</p>
</div>

<!-- Sell Fee Field -->
<div class="form-group">
    {!! Form::label('sell_fee', 'Comisión por venta:') !!}
    <p>@fee($offer->sell_fee)</p>
</div>

@if (Auth::user()->isManager() || Auth::user()->id ==$offer->user_id )
    <!-- User Id Field -->
    <div class="form-group">
        {!! Form::label('user_id', 'Inversor (oculto):') !!}
        <p><a href="{{route('users.show', $offer->user)}}"></a> {!! $offer->user->name !!}</p>
    </div>
@endif

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Fecha de creación:') !!}
    <p>{!! $offer->created_at->diffForHumans() !!}</p>
</div>
