@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Confirmar operación
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'offers.store']) !!}

                        <div class="form-group col-sm-12">
                            {{ old('amount') }} acciones de {!! $vehicle->name !!} a @money(old('stock_price')) por acción (@money(old('amount')*old('stock_price')))
                        </div>

                        {!! Form::hidden('confirm', true) !!}
                        {!! Form::hidden('user_id', old('user_id')) !!}
                        {!! Form::hidden('vehicle_id', old('vehicle_id')) !!}
                        {!! Form::hidden('amount', old('amount')) !!}
                        {!! Form::hidden('stock_price', old('stock_price')) !!}


                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Confirmar', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('vehicles.show', $vehicle) !!}" class="btn btn-default">Atrás</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
