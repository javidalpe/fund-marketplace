<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $operation->id !!}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Tipo:') !!}
    <p>{!! $operation->type !!}</p>
</div>

<!-- Número de acciones Field -->
<div class="form-group">
    {!! Form::label('amount', 'Número de acciones:') !!}
    <p>{!! $operation->amount !!}</p>
</div>

<!-- Precio de la acción Field -->
<div class="form-group">
    {!! Form::label('stock_price', 'Precio de la acción:') !!}
    <p>@money($operation->stock_price)</p>
</div>

<!-- Fecha de la operación Field -->
<div class="form-group">
    {!! Form::label('completed_at', 'Fecha de la operación:') !!}
    <p>{!! $operation->completed_at !!}</p>
</div>

<!-- Vehicle Id Field -->
<div class="form-group">
    {!! Form::label('vehicle_id', 'Vehicle Id:') !!}
    <p>{!! $operation->vehicle_id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'Id Inversor:') !!}
    <p>{!! $operation->user_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Fecha de creación:') !!}
    <p>{!! $operation->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Última actualización:') !!}
    <p>{!! $operation->updated_at !!}</p>
</div>

