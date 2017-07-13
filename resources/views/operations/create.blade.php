@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Operation
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'operations.store']) !!}
                        <div class="form-group col-sm-6 col-md-4">
                            {!! Form::label('vehicle_id', 'Vehículo:') !!}
                            {!! Form::select('vehicle_id', $vehicles, null, ['class' => 'form-control']) !!}
                            <p class="help-block small">Vehículo sobre el que se realiza la operación.</p>
                        </div>
                        <div class="form-group col-sm-6 col-md-4">
                            {!! Form::label('user_id', 'Comprador/Vendedor:') !!}
                            {!! Form::select('user_id', $investors, null, ['class' => 'form-control']) !!}
                            <p class="help-block small">Inversor involucrado en la operación.</p>
                        </div>
                        @include('operations.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
