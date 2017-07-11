<!-- Número de acciones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Número de acciones:') !!}
    {!! Form::number('amount', isset($stock_amount)?$stock_amount:null, ['class' => 'form-control']) !!}
</div>

<!-- Precio de la acción Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock_price', 'Precio de la acción:') !!}
    <div class="input-group">
      {!! Form::number('stock_price', isset($stock_price)?$stock_price:null, ['class' => 'form-control']) !!}
      <div class="input-group-addon">€</div>
    </div>
</div>

<!-- Buyer Comment Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('buyer_comment', 'Comentarios para el vendedor:') !!}
    {!! Form::textarea('buyer_comment', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('bids.index') !!}" class="btn btn-default">Cancelar</a>
</div>
