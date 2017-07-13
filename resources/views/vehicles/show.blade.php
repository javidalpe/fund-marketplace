@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{ $vehicle->company }}
        </h1>
    </section>
    <div class="content">
        @if(Auth::user()->isInvestor())
            @if (count($operations) > 0)
                @component('components.box')
                    @slot('title')
                        Posición según el precio de venta actual
                    @endslot
                    @include('vehicles.position')
                    @can('offer', $vehicle)
                        <a href="{!! route('offers.create', ['vehicle' => $vehicle->id]) !!}" class="btn btn-primary">Publicar oferta de venta de acciones</a>
                    @endcan
                @endcomponent
            @endif
        @else
            @component('components.box')
                @slot('title')
                    Socios
                @endslot
                @include('vehicles.users.table')
            @endcomponent
        @endif

        @component('components.box')
            @slot('title')
                Operaciones
            @endslot
            @include('operations.table')
        @endcomponent

        @component('components.box')
            @slot('title')
                Información general
            @endslot
            @include('vehicles.show_fields')
            <a href="{!! route('vehicles.index') !!}" class="btn btn-default">Atrás</a>
        @endcomponent
        
    </div>
@endsection
