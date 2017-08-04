<dl class="dl-horizontal">
<!-- Id Field -->
<dt>{!! Form::label('id', 'Id:') !!}</dt><dd>{!! $user->id !!}</dd>

<!-- Name Field -->
<dt>{!! Form::label('name', 'Nombre:') !!}</dt><dd>{!! $user->name !!}</dd>

<!-- Precio acción Field -->
<dt>{!! Form::label('email', 'Email de contacto:') !!}</dt><dd>{!! $user->email !!}</dd>


<!-- Precio acción Field -->
<dt>{!! Form::label('nif', 'Documento de identidad:') !!}</dt><dd>{!! $user->nif !!}</dd>

<!-- Precio acción Field -->
<dt>{!! Form::label('civil_status', 'Estado civil:') !!}</dt><dd>{!! $user->civil_status !!}</dd>

<!-- Precio acción Field -->
<dt>{!! Form::label('address', 'Dirección:') !!}</dt><dd>{!! $user->address !!}</dd>


<!-- Precio acción Field -->
<dt>{!! Form::label('phone', 'Teléfono:') !!}</dt><dd>{!! $user->phone !!}</dd>


<!-- Created At Field -->
<dt>{!! Form::label('created_at', 'Fecha de creación:') !!}</dt><dd>{!! $user->created_at->format('d M. Y') !!}</dd>

<!-- Updated At Field -->
<dt>{!! Form::label('updated_at', 'Última actualización:') !!}</dt><dd>{!! $user->updated_at->format('d M. Y') !!}</dd>
</dl>
