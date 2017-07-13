<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $user->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    <p>{!! $user->name !!}</p>
</div>

<!-- Precio acción Field -->
<div class="form-group">
    {!! Form::label('email', 'Email de contacto:') !!}
    <p>{!! $user->email !!}</p>
</div>


<!-- Precio acción Field -->
<div class="form-group">
    {!! Form::label('nif', 'Documento de identidad:') !!}
    <p>{!! $user->nif !!}</p>
</div>

<!-- Precio acción Field -->
<div class="form-group">
    {!! Form::label('civil_status', 'Estado civil:') !!}
    <p>{!! $user->civil_status !!}</p>
</div>

<!-- Precio acción Field -->
<div class="form-group">
    {!! Form::label('address', 'Dirección:') !!}
    <p>{!! $user->address !!}</p>
</div>


<!-- Precio acción Field -->
<div class="form-group">
    {!! Form::label('phone', 'Teléfono:') !!}
    <p>{!! $user->phone !!}</p>
</div>


<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Fecha de creación:') !!}
    <p>{!! $user->created_at->format('d M. Y') !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Última actualización:') !!}
    <p>{!! $user->updated_at->format('d M. Y') !!}</p>
</div>
