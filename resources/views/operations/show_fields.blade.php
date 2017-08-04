<dl class="dl-horizontal">
<!-- Type Field -->
<dt>{!! Form::label('type', 'Tipo:') !!}</dt><dd>{!! $operation->type !!}</dd>

<!-- N. acciones Field -->
<dt>{!! Form::label('amount', 'N. acciones:') !!}</dt><dd>{!! $operation->amount !!}</dd>

<!-- Precio acción Field -->
<dt>{!! Form::label('stock_price', 'Precio acción:') !!}</dt><dd>@stock($operation->stock_price)</dd>

<!-- Fecha de la operación Field -->
<dt>{!! Form::label('completed_at', 'Fecha de la operación:') !!}</dt><dd>{!! $operation->completed_at->format('d M. Y') !!}</dd>

@if (Auth::user()->isManager())
    <!-- Id Field -->
    <dt>{!! Form::label('id', 'Id:') !!}</dt><dd>{!! $operation->id !!}</dd>

    <!-- Vehicle Id Field -->
    <dt>{!! Form::label('vehicle_id', 'Vehicle Id:') !!}</dt><dd>{!! $operation->vehicle_id !!}</dd>

    <!-- User Id Field -->
    <dt>{!! Form::label('user_id', 'Id Inversor:') !!}</dt><dd>{!! $operation->user_id !!}</dd>

    <!-- Created At Field -->
    <dt>{!! Form::label('created_at', 'Fecha de creación:') !!}</dt><dd>{!! $operation->created_at->format('d M. Y') !!}</dd>

    <!-- Updated At Field -->
    <dt>{!! Form::label('updated_at', 'Última actualización:') !!}</dt><dd>{!! $operation->updated_at->format('d M. Y') !!}</dd>
@endif
</dl>
