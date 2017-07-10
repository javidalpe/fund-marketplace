<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $vehicle->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Denominación del vehículo:') !!}
    <p>{!! $vehicle->name !!}</p>
</div>

<!-- Nombre de la compañía Field -->
<div class="form-group">
    {!! Form::label('company', 'Nombre de la compañía:') !!}
    <p>{!! $vehicle->company !!}</p>
</div>

<!-- Website Field -->
<div class="form-group">
    {!! Form::label('website', 'Sitio web:') !!}
    <p>{!! $vehicle->website !!}</p>
</div>

<!-- Precio de la acción Field -->
<div class="form-group">
    {!! Form::label('stock_price', 'Precio de la acción:') !!}
    <p>@money($vehicle->stock_price)</p>
</div>

<!-- Número de acciones Field -->
<div class="form-group">
    {!! Form::label('shares_amount', 'Número de acciones:') !!}
    <p>{!! $vehicle->shares_amount !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email de contacto:') !!}
    <p>{!! $vehicle->email !!}</p>
</div>

<!-- Contact Field -->
<div class="form-group">
    {!! Form::label('contact', 'Persona de contacto:') !!}
    <p>{!! $vehicle->contact !!}</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Teléfono de contacto:') !!}
    <p>{!! $vehicle->phone !!}</p>
</div>

<!-- Fund Id Field -->
<div class="form-group">
    {!! Form::label('fund_id', 'Fund Id:') !!}
    <p>{!! $vehicle->fund_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Fecha de creación:') !!}
    <p>{!! $vehicle->created_at->format('d M. Y') !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Última actualización:') !!}
    <p>{!! $vehicle->updated_at->format('d M. Y') !!}</p>
</div>
