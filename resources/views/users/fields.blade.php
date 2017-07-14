<!-- Name Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    <p class="help-block small">Nombre y apellidos del inversor.</p>
</div>

<!-- Email Price Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('email', 'Email de contacto:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
    <p class="help-block small">Email de contacto del inversor. Se usará como identificador para que inicie sesión.</p>
</div>

<!-- Email Price Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('nif', 'DNI o NIE:') !!}
    {!! Form::text('nif', null, ['class' => 'form-control']) !!}
    <p class="help-block small">Documento de identidad del inversor.</p>
</div>

<!-- Title Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('civil_status', 'Estado civil:') !!}
    {!! Form::select('civil_status', ['Casado/a' => 'Casado/a', 'Soltero/a' => 'Soltero/a', 'Divorciado/a' => 'Divorciado/a', 'Viudo/a' => 'Viudo/a', 'Padre o madre' => 'Padre o madre', 'Hijo/a' => 'Hijo/a'], null, ['class' => 'form-control']) !!}
    <p class="help-block small">Estado civil del inversor.</p>
</div>

<!-- Email Price Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('address', 'Dirección completa:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
    <p class="help-block small">Dirección habitual del inversor.</p>
</div>

<!-- Email Price Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('phone', 'Teléfono:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
    <p class="help-block small">Teléfono de contacto del inversor. No se enviarán comunicaciones a este teléfono.</p>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary hidden-print']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default hidden-print">Cancelar</a>
</div>
