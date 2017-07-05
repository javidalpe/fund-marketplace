<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::select('type', ['Buy' => 'Buy', 'Sell' => 'Sell'], null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Stock Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock_price', 'Stock Price:') !!}
    {!! Form::number('stock_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Completed At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('completed_at', 'Completed At:') !!}
    {!! Form::date('completed_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('operations.index') !!}" class="btn btn-default">Cancel</a>
</div>
