<dl class="dl-horizontal">
<!-- Name Field -->
<dt>{!! Form::label('name', 'Nombre:') !!}</dt><dd>{!! $fund->name !!}</dd>

<!-- Website Field -->
<dt>{!! Form::label('website', 'Sitio web:') !!}</dt><dd><a href="{!! $fund->website !!}" target="_blank">{!! $fund->website !!}</a></dd>

<!-- Email Field -->
<dt>{!! Form::label('email', 'Email de contacto:') !!}</dt><dd>{!! $fund->email !!}</dd>

<!-- Contact Field -->
<dt>{!! Form::label('contact', 'Persona de contacto:') !!}</dt><dd>{!! $fund->contact !!}</dd>

<!-- Phone Field -->
<dt>{!! Form::label('phone', 'Teléfono de contacto:') !!}</dt><dd>{!! $fund->phone !!}</dd>

@if (Auth::user()->isManager())
    <!-- Id Field -->
    <dt>{!! Form::label('id', 'Id:') !!}</dt><dd>{!! $fund->id !!}</dd>

    <!-- Created At Field -->
    <dt>{!! Form::label('created_at', 'Fecha de creación:') !!}</dt><dd>{!! $fund->created_at->format('d M. Y') !!}</dd>

    <!-- Updated At Field -->
    <dt>{!! Form::label('updated_at', 'Última actualización:') !!}</dt><dd>{!! $fund->updated_at->format('d M. Y') !!}</dd>
@endif
</dl>
