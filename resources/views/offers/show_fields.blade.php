<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $offer->id !!}</p>
</div>

<!-- N. acciones Field -->
<div class="form-group">
    {!! Form::label('amount', 'N. acciones:') !!}
    <p>{!! $offer->amount !!}</p>
</div>

<!-- Precio acción Field -->
<div class="form-group">
    {!! Form::label('stock_price', 'Precio acción:') !!}
    <p>@money($offer->stock_price)</p>
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
    {!! Form::label('sell_fee', 'Sell Fee:') !!}
    <p>@money($offer->sell_fee)</p>
</div>

@if (Auth::user()->isManager())
    <!-- Vehicle Id Field -->
    <div class="form-group">
        {!! Form::label('vehicle_id', 'Vehicle Id:') !!}
        <p>{!! $offer->vehicle_id !!}</p>
    </div>

    <!-- User Id Field -->
    <div class="form-group">
        {!! Form::label('user_id', 'Id Inversor:') !!}
        <p>{!! $offer->user_id !!}</p>
    </div>
@endif

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Fecha de creación:') !!}
    <p>{!! $offer->created_at->diffForHumans() !!}</p>
</div>
