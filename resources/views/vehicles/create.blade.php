@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Vehicle
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'vehicles.store']) !!}
                        <div class="form-group col-sm-6 col-md-4">
                            {!! Form::label('fund_id', 'Fund:') !!}
                            {!! Form::select('fund_id', $funds, null, ['class' => 'form-control']) !!}
                            <p class="help-block small">Fondo o club al que pertenece el vehículo de inversión.</p>
                        </div>
                        @include('vehicles.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
