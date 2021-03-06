<!-- N. acciones Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('amount', 'N. acciones:') !!}
    {!! Form::number('amount', isset($stock_amount)?$stock_amount:null, ['class' => 'form-control']) !!}
    <p class="help-block small">Número de acciones que quieres comprarle al vendedor.</p>
</div>

<!-- Precio acción Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('stock_price', 'Precio acción:') !!}
    <div class="input-group">
      {!! Form::number('stock_price', isset($stock_price) ? $stock_price:null, ['class' => 'form-control', 'step' => '0.000000001']) !!}
      <div class="input-group-addon">€</div>
    </div>
    <p class="help-block small">Precio al que le quieres comprar cada participación.</p>
</div>

<!-- Buyer Comment Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('buyer_comment', 'Comentarios para el vendedor:') !!}
    {!! Form::textarea('buyer_comment', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary hidden-print']) !!}
    <a href="{!! route('bids.index') !!}" class="btn btn-default hidden-print">Cancelar</a>
</div>
