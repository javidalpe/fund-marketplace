<div class="form-group">
    {!! Form::label('amount', 'Número total de participaciones:') !!}
    <p>{!! $position['amount'] !!}</p>
</div>

<div class="form-group">
    {!! Form::label('total_price', 'Precio de venta:') !!}
    <p>@money($position['total_price'])</p>
</div>

<div class="form-group">
    {!! Form::label('total', 'Rentabilidad media esperada:') !!}
    <p>@profitability($position['profitability'])</p>
</div>

<div class="form-group">
    <table class="table table-responsive" id="positions-table">
        <thead>
            <th>N. acciones</th>
            @if ($position['amount'] != $position['total_amount'])
                <th>N. acciones a vender</th>
                <th>N. acciones restantes</th>
            @endif
            <th>Precio de compra</th>
            <th>Precio de venta</th>
            <th>Rentabilidad</th>
        </thead>
        <tbody>
        @foreach($position['stocks'] as $stock)
            <tr>
                <td>{!! $stock['amount'] !!}</td>
                @if ($position['amount'] != $position['total_amount'])
                    <td>{!! $stock['stock_amount'] !!}</td>
                    <td>{!! $stock['amount'] - $stock['stock_amount'] !!}</td>
                @endif
                <td>@money($stock['buy_price'])</td>
                <td>@money($stock['sell_price'])</td>
                <td>@profitability($stock['profitability'])</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
