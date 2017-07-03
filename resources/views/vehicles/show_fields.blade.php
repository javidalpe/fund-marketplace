<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $vehicle->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $vehicle->name !!}</p>
</div>

<!-- Website Field -->
<div class="form-group">
    {!! Form::label('website', 'Website:') !!}
    <p>{!! $vehicle->website !!}</p>
</div>

<!-- Stock Value Field -->
<div class="form-group">
    {!! Form::label('stock_value', 'Stock Value:') !!}
    <p>{!! $vehicle->stock_value !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $vehicle->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $vehicle->updated_at !!}</p>
</div>

