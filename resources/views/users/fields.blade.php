<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email de contacto:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nif', 'DNI o NIE:') !!}
    {!! Form::text('nif', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('civil_status', 'Estado civil:') !!}
    {!! Form::select('civil_status', ['Casado/a' => 'Casado/a', 'Soltero/a' => 'Soltero/a', 'Divorciado/a' => 'Divorciado/a', 'Viudo/a' => 'Viudo/a', 'Padre o madre' => 'Padre o madre', 'Hijo/a' => 'Hijo/a'], null, ['class' => 'form-control']) !!}
</div>

<!-- Email Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Dirección completa:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Teléfono:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancelar</a>
</div>
