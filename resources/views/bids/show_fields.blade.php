<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $bid->id !!}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{!! $bid->amount !!}</p>
</div>

<!-- Stock Price Field -->
<div class="form-group">
    {!! Form::label('stock_price', 'Stock Price:') !!}
    <p>@money($bid->stock_price)</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $bid->status !!}</p>
</div>

<!-- Buyer Comment Field -->
<div class="form-group">
    {!! Form::label('buyer_comment', 'Buyer Comment:') !!}
    <p>{!! $bid->buyer_comment !!}</p>
</div>

<!-- Seller Comment Field -->
<div class="form-group">
    {!! Form::label('seller_comment', 'Seller Comment:') !!}
    <p>{!! $bid->seller_comment !!}</p>
</div>

<!-- Buy Fee Field -->
<div class="form-group">
    {!! Form::label('buy_fee', 'Buy Fee:') !!}
    <p>{!! $bid->buy_fee !!}</p>
</div>

<!-- Offer Id Field -->
<div class="form-group">
    {!! Form::label('offer_id', 'Offer Id:') !!}
    <p>{!! $bid->offer_id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $bid->user_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $bid->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $bid->updated_at !!}</p>
</div>
