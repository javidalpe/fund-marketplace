<div class="form-group">
    {!! Form::label('stock_amount', 'Número total de participaciones:') !!}
    <p>{!! $position['stock_amount'] !!}</p>
</div>

<div class="form-group">
    {!! Form::label('stock_cost', 'Precio de compra:') !!}
    <p>@money($position['stock_cost'])</p>
</div>

<div class="form-group">
    {!! Form::label('stock_price', 'Precio de venta estimado actual:') !!}
    <p>@money($position['stock_price'])</p>
</div>

<div class="form-group">
    {!! Form::label('profitability', 'Rentabilidad estimada:') !!}
    <p>@profitability($position['profitability'])</p>
</div>
