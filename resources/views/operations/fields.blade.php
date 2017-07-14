<!-- N. acciones Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('amount', 'N. acciones:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
    <p class="help-block small">Número de participaciones involucradas en la operación. Usa valores positivos para compra, negativos para venta.</p>
</div>

<!-- Precio acción Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('stock_price', 'Precio acción:') !!}
    <div class="input-group">
      {!! Form::number('stock_price', null, ['class' => 'form-control', 'step' => '0.000000001']) !!}
      <div class="input-group-addon">€</div>
    </div>
    <p class="help-block small">Precio (respecto del vehículo de inversión) al que se compró o vendió cada participación.</p>
</div>

<!-- Fecha de la operación Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('completed_at', 'Fecha de la operación:') !!}
    {!! Form::date('completed_at', null, ['class' => 'form-control']) !!}
    <p class="help-block small">Fecha en la que se completó la operación.</p>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary hidden-print']) !!}
    <a href="{!! route('operations.index') !!}" class="btn btn-default hidden-print">Cancelar</a>
</div>
