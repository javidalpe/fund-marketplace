@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{ $vehicle->company }}
        </h1>
    </section>
    <div class="content">
        @if(Auth::user()->isInvestor())
            <h4>Posición</h4>
            <div class="box box-primary">
                <div class="box-body">
                    <div class="row" style="padding-left: 20px">
                        @include('vehicles.position')
                        @can('offer', $vehicle)
                            <a href="{!! route('offers.create', ['vehicle' => $vehicle->id]) !!}" class="btn btn-primary">Publicar oferta de venta de acciones</a>
                        @endcan
                    </div>
                </div>
            </div>
        @else
            <h4>Socios</h4>
            <div class="box box-primary">
                <div class="box-body">
                    <div class="row" style="padding-left: 20px">
                        @include('vehicles.users.table')
                    </div>
                </div>
            </div>
        @endif

        <h4>Operaciones</h4>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('operations.table')
                </div>
            </div>
        </div>

        <h4>Información general</h4>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('vehicles.show_fields')
                    <a href="{!! route('vehicles.index') !!}" class="btn btn-default">Atrás</a>
                </div>
            </div>
        </div>
    </div>
@endsection
