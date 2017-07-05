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

<!-- Buyer Comment Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('buyer_comment', 'Buyer Comment:') !!}
    {!! Form::textarea('buyer_comment', null, ['class' => 'form-control']) !!}
</div>

<!-- Seller Comment Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('seller_comment', 'Seller Comment:') !!}
    {!! Form::textarea('seller_comment', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('bids.index') !!}" class="btn btn-default">Cancel</a>
</div>
