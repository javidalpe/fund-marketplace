<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $user->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('amount', 'Name:') !!}
    <p>{!! $user->name !!}</p>
</div>

<!-- Email Price Field -->
<div class="form-group">
    {!! Form::label('stock_price', 'Email Price:') !!}
    <p>{!! $user->email !!}</p>
</div>


<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $user->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $user->updated_at !!}</p>
</div>
