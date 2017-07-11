<!-- Número de acciones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Número de acciones:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Precio de la acción Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock_price', 'Precio de la acción:') !!}
    <div class="input-group">
      {!! Form::number('stock_price', null, ['class' => 'form-control']) !!}
      <div class="input-group-addon">€</div>
</div>
</div>

<!-- Fecha de la operación Field -->
<div class="form-group col-sm-6">
    {!! Form::label('completed_at', 'Fecha de la operación:') !!}
    {!! Form::date('completed_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('operations.index') !!}" class="btn btn-default">Cancelar</a>
</div>
