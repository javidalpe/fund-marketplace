<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('user_id', 'Investor:') !!}
    {!! Form::select('user_id', $investors, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-4">
    {!! Form::submit('Añadir', ['class' => 'btn btn-primary']) !!}
</div>
