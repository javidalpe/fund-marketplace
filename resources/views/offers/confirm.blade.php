@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Confirmar oferta de venta
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')

        @component('components.box')
            @slot('title')
                Resumen de operación para {{ $position['amount'] }} acciones a @stock($position['stock_price']) por acción
            @endslot
            @include('vehicles.position')

        @endcomponent
        @component('components.box')
            @slot('title')
                Desglose final
            @endslot
            @include('offers.resume')

            {!! Form::open(['route' => 'offers.store']) !!}

                {!! Form::hidden('confirm', true) !!}
                {!! Form::hidden('user_id', old('user_id')) !!}
                {!! Form::hidden('vehicle_id', old('vehicle_id')) !!}
                {!! Form::hidden('amount', old('amount')) !!}
                {!! Form::hidden('stock_price', old('stock_price')) !!}
                <!-- Submit Field -->
                <div class="form-group col-sm-12">
                    {!! Form::submit('Publicar oferta', ['class' => 'btn btn-primary hidden-print']) !!}
                    <a href="{!! route('vehicles.show', $vehicle) !!}" class="btn btn-default hidden-print">Cancelar</a>
                </div>
            {!! Form::close() !!}
        @endcomponent

    </div>
@endsection
