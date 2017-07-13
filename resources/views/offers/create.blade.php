@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Crear oferta de venta de acciones
        </h1>
    </section>
    <div class="content">
        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'offers.store']) !!}

                        @if (!Request::has('vehicle'))
                            <div class="form-group col-sm-6 col-md-4">
                                {!! Form::label('vehicle_id', 'Vehículo:') !!}
                                {!! Form::select('vehicle_id', $vehicles, null, ['class' => 'form-control']) !!}
                                <p class="help-block small">Vehículo de inversión del que se quieres vender participaciones.</p>
                            </div>
                        @else
                            {!! Form::hidden('vehicle_id', Request::get('vehicle')) !!}
                        @endif


                        @if (Auth::user()->isManager())
                            <div class="form-group col-sm-6 col-md-4">
                                {!! Form::label('user_id', 'Vendedor:') !!}
                                {!! Form::select('user_id', $investors, null, ['class' => 'form-control']) !!}
                                <p class="help-block small">Inversor que quiere vender participaciones.</p>
                            </div>
                        @else
                            {!! Form::hidden('user_id', Auth::user()->id) !!}
                        @endif

                        @include('offers.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
