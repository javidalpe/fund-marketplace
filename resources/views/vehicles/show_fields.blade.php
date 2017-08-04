<dl class="dl-horizontal">
<!-- Name Field -->
<dt>{!! Form::label('name', 'Denominación del vehículo:') !!}</dt><dd>{!! $vehicle->name !!}</dd>

<!-- Nombre de la compañía Field -->
<dt>{!! Form::label('company', 'Nombre de la compañía:') !!}</dt><dd>{!! $vehicle->company !!}</dd>

<!-- Website Field -->
<dt>{!! Form::label('website', 'Sitio web:') !!}</dt><dd><a href="{!! $vehicle->website !!}" target="_blank">{!! $vehicle->website !!}</a></dd>

<!-- Precio acción Field -->
<dt>{!! Form::label('stock_price', 'Precio acción vehículo:') !!}</dt><dd>@stock($vehicle->stock_price)</dd>

<!-- N. acciones Field -->
<dt>{!! Form::label('shares_amount', 'N. acciones vehículo:') !!}</dt><dd>{!! $vehicle->shares_amount !!}</dd>

<!-- Precio acción Field -->
<dt>{!! Form::label('company_stock_price', 'Precio acción compañía:') !!}</dt><dd>@stock($vehicle->company_stock_price)</dd>

<!-- N. acciones Field -->
<dt>{!! Form::label('company_shares_amount', 'N. acciones compañía:') !!}</dt><dd>{!! $vehicle->company_shares_amount !!}</dd>

<!-- Email Field -->
<dt>{!! Form::label('email', 'Email de contacto:') !!}</dt><dd>{!! $vehicle->email !!}</dd>

<!-- Contact Field -->
<dt>{!! Form::label('contact', 'Persona de contacto:') !!}</dt><dd>{!! $vehicle->contact !!}</dd>

<!-- Phone Field -->
<dt>{!! Form::label('phone', 'Teléfono de contacto:') !!}</dt><dd>{!! $vehicle->phone !!}</dd>

@if (Auth::user()->isManager())

    <!-- Id Field -->
    <dt>{!! Form::label('id', 'Id:') !!}</dt><dd>{!! $vehicle->id !!}</dd>


    <!-- Fund Id Field -->
    <dt>{!! Form::label('fund_id', 'Fund Id:') !!}</dt><dd>{!! $vehicle->fund_id !!}</dd>

    <!-- Created At Field -->
    <dt>{!! Form::label('created_at', 'Fecha de creación:') !!}</dt><dd>{!! $vehicle->created_at->format('d M. Y') !!}</dd>

    <!-- Updated At Field -->
    <dt>{!! Form::label('updated_at', 'Última actualización:') !!}</dt><dd>{!! $vehicle->updated_at->format('d M. Y') !!}</dd>
@endif
</dl>
