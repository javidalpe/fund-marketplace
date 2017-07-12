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
                            <div class="form-group col-sm-6">
                                {!! Form::label('vehicle_id', 'Vehicle:') !!}
                                {!! Form::select('vehicle_id', $vehicles, null, ['class' => 'form-control']) !!}
                            </div>
                        @else
                            {!! Form::hidden('vehicle_id', Request::get('vehicle')) !!}
                        @endif


                        @if (Auth::user()->isManager())
                            <div class="form-group col-sm-6">
                                {!! Form::label('user_id', 'Investor:') !!}
                                {!! Form::select('user_id', $investors, null, ['class' => 'form-control']) !!}
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
