<!-- Title Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::textarea('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::email('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::date('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::number('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::password('title', ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::file('title') !!}
</div>
<div class="clearfix"></div>

<!-- Title Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::select('title', ['Daily' => 'Daily', 'Weekly' => 'Weekly', 'Monthly' => 'Monthly'], null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('title', 'Title:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('title', false) !!}
        {!! Form::checkbox('title', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary hidden-print']) !!}
    <a href="{!! route('examples.index') !!}" class="btn btn-default">Cancel</a>
</div>
