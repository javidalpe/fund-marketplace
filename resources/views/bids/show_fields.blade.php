<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $bid->id !!}</p>
</div>

<!-- N. acciones Field -->
<div class="form-group">
    {!! Form::label('amount', 'N. acciones:') !!}
    <p>{!! $bid->amount !!}</p>
</div>

<!-- Precio acción Field -->
<div class="form-group">
    {!! Form::label('stock_price', 'Precio acción:') !!}
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
    <p>@money($bid->buy_fee)</p>
</div>

<!-- Offer Id Field -->
<div class="form-group">
    {!! Form::label('offer_id', 'Offer Id:') !!}
    <p>{!! $bid->offer_id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'Id Inversor:') !!}
    <p>{!! $bid->user_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Fecha de creación:') !!}
    <p>{!! $bid->created_at->format('d M. Y') !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Última actualización:') !!}
    <p>{!! $bid->updated_at->format('d M. Y') !!}</p>
</div>
