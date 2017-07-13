<!-- Name Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    <p class="help-block small">Nombre del fondo de inversión o club. Ejemplo: Fintech Ventures.</p>
</div>

<!-- Website Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('website', 'Sitio web:') !!}
    {!! Form::text('website', null, ['class' => 'form-control']) !!}
    <p class="help-block small">Página web del fondo.</p>
</div>

<!-- Email Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('email', 'Email de contacto:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
    <p class="help-block small">Email de soporte al que se referirán los inversores.</p>
</div>

<!-- Contact Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('contact', 'Persona de contacto:') !!}
    {!! Form::text('contact', null, ['class' => 'form-control']) !!}
    <p class="help-block small">Nombre de la persona de contacto del fondo.</p>
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('phone', 'Teléfono de contacto:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
    <p class="help-block small">Teléfono de la persona de contacto del fondo.</p>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('funds.index') !!}" class="btn btn-default">Cancelar</a>
</div>
