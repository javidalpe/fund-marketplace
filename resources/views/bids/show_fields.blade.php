<dl class="dl-horizontal">
<!-- Id Field -->
<dt>{!! Form::label('id', 'Identificador de la puja:') !!}</dt><dd>#{!! $bid->id !!}</dd>

<!-- Offer Id Field -->
<dt>{!! Form::label('offer_id', 'Identificador de la oferta:') !!}</dt><dd><a href="{{ route('offers.show', $bid->offer) }}">#{!! $bid->offer->id !!}</a></dd>

<!-- N. acciones Field -->
<dt>{!! Form::label('amount', 'N. acciones:') !!}</dt><dd>{!! $bid->amount !!}</dd>

<!-- Precio acción Field -->
<dt>{!! Form::label('stock_price', 'Precio acción:') !!}</dt><dd>@stock($bid->stock_price)</dd>

<!-- Status Field -->
<dt>{!! Form::label('status', 'Status:') !!}</dt><dd>@include('bids.status')</dd>

<!-- Buyer Comment Field -->
<dt>{!! Form::label('buyer_comment', 'Buyer Comment:') !!}</dt><dd>{!! $bid->buyer_comment !!}</dd>

<!-- Seller Comment Field -->
<dt>{!! Form::label('seller_comment', 'Seller Comment:') !!}</dt><dd>{!! $bid->seller_comment !!}</dd>

<!-- Buy Fee Field -->
<dt>{!! Form::label('buy_fee', 'Buy Fee:') !!}</dt><dd>@money($bid->buy_fee)</dd>

@if (Auth::user()->isManager() || Auth::user()->id == $bid->user_id)

    <!-- User Id Field -->
    <dt>{!! Form::label('user_id', 'Inversor (oculto):') !!}</dt><dd>{!! $bid->user->name !!}</dd>

    <!-- Created At Field -->
    <dt>{!! Form::label('created_at', 'Fecha de creación:') !!}</dt><dd>{!! $bid->created_at->format('d M. Y') !!}</dd>
@endif

<!-- Updated At Field -->
<dt>{!! Form::label('updated_at', 'Última actualización:') !!}</dt><dd>{!! $bid->updated_at->format('d M. Y') !!}</dd>
</dl>
