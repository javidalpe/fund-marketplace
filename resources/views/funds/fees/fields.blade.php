<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('from', 'Desde % rentabilidad:') !!}
    <div class="input-group">
        {!! Form::number('from', null, ['class' => 'form-control']) !!}
        <div class="input-group-addon">%</div>
    </div>
    <p class="help-block small">Mínimo porcentage (0%-100%) del intervalo de rentabilidad obtenida para el que se aplica esta comisión.</p>
</div>

<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('to', 'Hasta % rentabilidad:') !!}
    <div class="input-group">
        {!! Form::number('to', null, ['class' => 'form-control']) !!}
        <div class="input-group-addon">%</div>
    </div>
    <p class="help-block small">Máximo porcentage (0%-100%) del intervalo de rentabilidad obtenida para el que se aplica esta comisión.</p>
</div>

<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('min', 'Comisión mínima:') !!}
    <div class="input-group">
        {!! Form::number('min', null, ['class' => 'form-control']) !!}
        <div class="input-group-addon">€</div>
    </div>
    <p class="help-block small">Comisión mínima aplicable a la venta de accione.</p>
</div>

<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('percentage', 'Porcentaje de comisión:') !!}
    <div class="input-group">
        {!! Form::number('percentage', null, ['class' => 'form-control']) !!}
        <div class="input-group-addon">%</div>
    </div>
    <p class="help-block small">Porcentaje (0%-100%) de comisión respecto del beneficio de la venta de acciones.</p>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary hidden-print']) !!}
    <a href="{!! route('funds.show', $fund) !!}" class="btn btn-default hidden-print">Cancelar</a>
</div>
