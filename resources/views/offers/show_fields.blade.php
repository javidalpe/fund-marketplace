<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $offer->id !!}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{!! $offer->amount !!}</p>
</div>

<!-- Stock Price Field -->
<div class="form-group">
    {!! Form::label('stock_price', 'Stock Price:') !!}
    <p>{!! $offer->stock_price !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $offer->status !!}</p>
</div>

<!-- Sell Fee Field -->
<div class="form-group">
    {!! Form::label('sell_fee', 'Sell Fee:') !!}
    <p>{!! $offer->sell_fee !!}</p>
</div>

<!-- Vehicle Id Field -->
<div class="form-group">
    {!! Form::label('vehicle_id', 'Vehicle Id:') !!}
    <p>{!! $offer->vehicle_id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $offer->user_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $offer->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $offer->updated_at !!}</p>
</div>

