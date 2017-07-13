<!-- N. acciones Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('amount', 'N. acciones:') !!}
    {!! Form::number('amount', isset($stock_amount) ? $stock_amount:null, ['class' => 'form-control']) !!}
    <p class="help-block small">Número de participaciones que quieres poner a la venta.</p>
</div>

<!-- Precio acción Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('stock_price', 'Precio acción:') !!}
    <div class="input-group">
      {!! Form::number('stock_price', isset($stock_price) ? $stock_price:null, ['class' => 'form-control', 'step' => '0.000000001']) !!}
      <div class="input-group-addon">€</div>
    </div>
    <p class="help-block small">Precio al que le quieres vender cada participación.</p>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('offers.index') !!}" class="btn btn-default">Cancelar</a>
</div>
