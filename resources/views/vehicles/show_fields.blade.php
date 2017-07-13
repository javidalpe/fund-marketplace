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
    <p><a href="{!! $vehicle->website !!}" target="_blank">{!! $vehicle->website !!}</a></p>
</div>

<!-- Precio acción Field -->
<div class="form-group">
    {!! Form::label('stock_price', 'Precio acción vehículo:') !!}
    <p>@stock($vehicle->stock_price)</p>
</div>

<!-- N. acciones Field -->
<div class="form-group">
    {!! Form::label('shares_amount', 'N. acciones vehículo:') !!}
    <p>{!! $vehicle->shares_amount !!}</p>
</div>

<!-- Precio acción Field -->
<div class="form-group">
    {!! Form::label('company_stock_price', 'Precio acción compañía:') !!}
    <p>@stock($vehicle->company_stock_price)</p>
</div>

<!-- N. acciones Field -->
<div class="form-group">
    {!! Form::label('company_shares_amount', 'N. acciones compañía:') !!}
    <p>{!! $vehicle->company_shares_amount !!}</p>
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

@if (Auth::user()->isManager())

    <!-- Id Field -->
    <div class="form-group">
        {!! Form::label('id', 'Id:') !!}
        <p>{!! $vehicle->id !!}</p>
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
@endif
