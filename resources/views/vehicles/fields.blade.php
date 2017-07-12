<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Denominción del vehículo:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre de la compañía Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company', 'Nombre de la compañía:') !!}
    {!! Form::text('company', null, ['class' => 'form-control']) !!}
</div>

<!-- Website Field -->
<div class="form-group col-sm-6">
    {!! Form::label('website', 'Sitio web de la compañía:') !!}
    {!! Form::text('website', null, ['class' => 'form-control']) !!}
</div>

<!-- Precio acción Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock_price', 'Precio acción:') !!}
    <div class="input-group">
      {!! Form::number('stock_price', null, ['class' => 'form-control']) !!}
      <div class="input-group-addon">€</div>
</div>
</div>

<!-- N. acciones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shares_amount', 'N. acciones:') !!}
    {!! Form::number('shares_amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email de contacto:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact', 'Persona de contacto:') !!}
    {!! Form::text('contact', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Teléfono de contacto:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('vehicles.index') !!}" class="btn btn-default">Cancelar</a>
</div>
