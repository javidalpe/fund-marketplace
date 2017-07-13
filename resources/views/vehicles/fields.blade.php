<!-- Name Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('name', 'Denominación del vehículo:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    <p class="help-block small">Nombre del vehículo de inversión. Ejemplo: Fintech Housers.</p>
</div>

<!-- Nombre de la compañía Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('company', 'Nombre de la compañía:') !!}
    {!! Form::text('company', null, ['class' => 'form-control']) !!}
    <p class="help-block small">Nombre de la compañía participada por el fondo. Ejemplo: Housers.</p>
</div>

<!-- Website Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('website', 'Sitio web de la compañía:') !!}
    {!! Form::text('website', null, ['class' => 'form-control']) !!}
    <p class="help-block small">Página web de la compañía participada.</p>
</div>

<!-- Precio acción Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('stock_price', 'Precio acción vehículo:') !!}
    <div class="input-group">
      {!! Form::number('stock_price', null, ['class' => 'form-control', 'step' => '0.000000001']) !!}
      <div class="input-group-addon">€</div>
    </div>
    <p class="help-block small">Valoración actual de cada participación del vehículo.</p>
</div>

<!-- N. acciones Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('shares_amount', 'N. acciones vehículo:') !!}
    {!! Form::number('shares_amount', null, ['class' => 'form-control']) !!}
    <p class="help-block small">Total de participaciones emitidas para el vehículo.</p>
</div>

<!-- Precio acción Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('company_stock_price', 'Precio acción compañía:') !!}
    <div class="input-group">
      {!! Form::number('company_stock_price', null, ['class' => 'form-control', 'step' => '0.000000001']) !!}
      <div class="input-group-addon">€</div>
    </div>
    <p class="help-block small">Valoración actual de cada participación de la compañía participada.</p>
</div>

<!-- N. acciones Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('company_shares_amount', 'N. acciones compañía:') !!}
    {!! Form::number('company_shares_amount', null, ['class' => 'form-control']) !!}
    <p class="help-block small">Total de participaciones emitidas por la compañía participada.</p>
</div>


<!-- Email Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('email', 'Email de contacto:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
    <p class="help-block small">Email de soporte del vehículo al que se referirán los inversores.</p>
</div>

<!-- Contact Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('contact', 'Persona de contacto:') !!}
    {!! Form::text('contact', null, ['class' => 'form-control']) !!}
    <p class="help-block small">Nombre de la persona de contacto del vehículo.</p>
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('phone', 'Teléfono de contacto:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
    <p class="help-block small">Teléfono de soporte del vehículo.</p>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('vehicles.index') !!}" class="btn btn-default">Cancelar</a>
</div>
